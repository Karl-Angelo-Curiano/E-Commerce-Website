<?php

namespace App\Libraries;

/**
 * Simple wrapper around Ollama's local REST API.
 * Docs: https://github.com/ollama/ollama/blob/main/docs/api.md
 */
class OllamaService
{
    protected string $baseUrl;
    protected string $model;
    protected int $timeout;

    public function __construct()
    {
        // You can move these into app/Config/Ollama.php if you prefer a proper Config class.
        $this->baseUrl = getenv('OLLAMA_BASE_URL') ?: 'http://127.0.0.1:11434';
        $this->model   = getenv('OLLAMA_MODEL') ?: 'qwen2.5:0.5b';
        $this->timeout = 120; // seconds; local generation can be slow on CPU
    }

    /**
     * Send a full chat history and get back the assistant's reply.
     *
     * @param array $messages e.g. [['role' => 'user', 'content' => 'hi'], ...]
     * @return array ['success' => bool, 'reply' => string, 'error' => string|null]
     */
    public function chat(array $messages): array
    {
        $url = rtrim($this->baseUrl, '/') . '/api/chat';

        $payload = [
            'model'    => $this->model,
            'messages' => $messages,
            'stream'   => false, // set true if you want to implement streaming (see note below)
        ];

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_POST           => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
            CURLOPT_POSTFIELDS     => json_encode($payload),
            CURLOPT_TIMEOUT        => $this->timeout,
        ]);

        $response = curl_exec($ch);
        $errno    = curl_errno($ch);
        $error    = curl_error($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($errno) {
            return ['success' => false, 'reply' => '', 'error' => "cURL error: {$error}"];
        }

        if ($httpCode !== 200) {
            return ['success' => false, 'reply' => '', 'error' => "Ollama returned HTTP {$httpCode}: {$response}"];
        }

        $decoded = json_decode($response, true);

        if (!isset($decoded['message']['content'])) {
            return ['success' => false, 'reply' => '', 'error' => 'Unexpected response format from Ollama.'];
        }

        return ['success' => true, 'reply' => $decoded['message']['content'], 'error' => null];
    }
}
