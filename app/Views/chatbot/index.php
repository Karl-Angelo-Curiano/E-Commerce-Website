<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Ollama Chatbot</title>
<style>
  body { font-family: system-ui, sans-serif; background: #f4f4f6; margin: 0; }
  .chat-wrap { max-width: 640px; margin: 40px auto; background: #fff; border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,.08); display: flex; flex-direction: column; height: 80vh; }
  .chat-header { padding: 16px 20px; border-bottom: 1px solid #eee; font-weight: 600;
    display: flex; justify-content: space-between; align-items: center; }
  .chat-header button { background: none; border: 1px solid #ddd; border-radius: 6px;
    padding: 4px 10px; cursor: pointer; font-size: 12px; }
  .chat-messages { flex: 1; overflow-y: auto; padding: 16px 20px; }
  .msg { margin-bottom: 12px; display: flex; }
  .msg.user { justify-content: flex-end; }
  .bubble { max-width: 75%; padding: 10px 14px; border-radius: 14px; line-height: 1.4; white-space: pre-wrap; }
  .msg.user .bubble { background: #2563eb; color: #fff; border-bottom-right-radius: 4px; }
  .msg.assistant .bubble { background: #f0f0f2; color: #222; border-bottom-left-radius: 4px; }
  .chat-input { display: flex; border-top: 1px solid #eee; padding: 12px; gap: 8px; }
  .chat-input input { flex: 1; padding: 10px 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 14px; }
  .chat-input button { padding: 10px 18px; border: none; border-radius: 8px; background: #2563eb;
    color: #fff; cursor: pointer; font-size: 14px; }
  .chat-input button:disabled { background: #93b4ee; cursor: not-allowed; }
  .typing { font-size: 13px; color: #888; padding: 0 20px 8px; }
</style>
</head>
<body>

<div class="chat-wrap">
  <div class="chat-header">
    <span>Ollama Chatbot</span>
    <button id="resetBtn">Reset</button>
  </div>

  <div class="chat-messages" id="messages">
    <?php foreach ($history as $m): ?>
      <?php if ($m['role'] === 'system') continue; ?>
      <div class="msg <?= esc($m['role']) ?>">
        <div class="bubble"><?= esc($m['content']) ?></div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="typing" id="typing" style="display:none;">Assistant is typing…</div>

  <div class="chat-input">
    <input type="text" id="messageInput" placeholder="Type a message…" autocomplete="off">
    <button id="sendBtn">Send</button>
  </div>
</div>

<script>
const messagesEl = document.getElementById('messages');
const input = document.getElementById('messageInput');
const sendBtn = document.getElementById('sendBtn');
const resetBtn = document.getElementById('resetBtn');
const typingEl = document.getElementById('typing');

const csrfName = '<?= csrf_token() ?>';
const csrfHash = '<?= csrf_hash() ?>';

function addBubble(role, text) {
  const row = document.createElement('div');
  row.className = 'msg ' + role;
  const bubble = document.createElement('div');
  bubble.className = 'bubble';
  bubble.textContent = text;
  row.appendChild(bubble);
  messagesEl.appendChild(row);
  messagesEl.scrollTop = messagesEl.scrollHeight;
}

async function sendMessage() {
  const text = input.value.trim();
  if (!text) return;

  addBubble('user', text);
  input.value = '';
  sendBtn.disabled = true;
  typingEl.style.display = 'block';

  try {
    const formData = new FormData();
    formData.append('message', text);
    formData.append(csrfName, csrfHash);

    const res = await fetch('<?= site_url('chatbot/send') ?>', {
      method: 'POST',
      body: formData,
    });
    const data = await res.json();

    // Update CSRF hash if CI rotated it
    if (data.csrf_hash) {
      // not used here since we regenerate token per view load; reload page if token errors occur
    }

    if (data.success) {
      addBubble('assistant', data.reply);
    } else {
      addBubble('assistant', 'Error: ' + data.error);
    }
  } catch (err) {
    addBubble('assistant', 'Network error: ' + err.message);
  } finally {
    sendBtn.disabled = false;
    typingEl.style.display = 'none';
    input.focus();
  }
}

sendBtn.addEventListener('click', sendMessage);
input.addEventListener('keydown', (e) => {
  if (e.key === 'Enter') sendMessage();
});

resetBtn.addEventListener('click', async () => {
  const formData = new FormData();
  formData.append(csrfName, csrfHash);
  await fetch('<?= site_url('chatbot/reset') ?>', { method: 'POST', body: formData });
  messagesEl.innerHTML = '';
});
</script>

</body>
</html>
