<?php

namespace App\Controllers;

use App\Libraries\OllamaService;

class Chatbot extends BaseController
{
    protected OllamaService $ollama;

    public function __construct()
    {
        $this->ollama = new OllamaService();
    }

    /**
     * GET /chatbot
     * Renders the chat UI. History is kept in session.
     */
    public function index()
    {
        $history = session()->get('chat_history') ?? [];

        return view('chatbot/index', ['history' => $history]);
    }

    /**
     * POST /chatbot/send
     * Accepts a user message, appends to session history, calls Ollama,
     * appends the reply, and returns JSON for the frontend to render.
     */
    public function send()
    {
        $request = service('request');
        $userMessage = trim((string) $request->getPost('message'));

        if ($userMessage === '') {
            return $this->response->setJSON([
                'success' => false,
                'error'   => 'Message cannot be empty.',
            ]);
        }

        $history = session()->get('chat_history') ?? [];

        // Optional: seed a system prompt on the very first message
        if (empty($history)) {
            $history[] = [
                'role'    => 'system',
                'content' => 'You are a helpful assistant.',
            ];
        }

        $history[] = ['role' => 'user', 'content' => $userMessage];

        $result = $this->ollama->chat($history);

        if (!$result['success']) {
            return $this->response->setJSON([
                'success' => false,
                'error'   => $result['error'],
            ]);
        }

        $history[] = ['role' => 'assistant', 'content' => $result['reply']];
        session()->set('chat_history', $history);

        return $this->response->setJSON([
            'success' => true,
            'reply'   => $result['reply'],
        ]);
    }

    /**
     * POST /chatbot/reset
     * Clears the conversation.
     */
    public function reset()
    {
        session()->remove('chat_history');

        return $this->response->setJSON(['success' => true]);
    }
}
