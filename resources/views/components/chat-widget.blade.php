{{-- =====================================================
    AI CHAT WIDGET - Asisten PUSDAI
===================================================== --}}

{{-- Floating Chat Button --}}
<button
    id="chat-fab"
    class="chat-fab"
    aria-label="Buka Chat AI"
    title="Asisten PUSDAI AI"
>
    <svg id="chat-fab-icon" class="chat-fab-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
    </svg>
    <svg id="chat-fab-close" class="chat-fab-svg chat-fab-hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <line x1="18" y1="6" x2="6" y2="18"></line>
        <line x1="6" y1="6" x2="18" y2="18"></line>
    </svg>
    <span class="chat-fab-pulse"></span>
</button>


{{-- Chat Window --}}
<div id="chat-window" class="chat-window chat-hidden">

    {{-- Header --}}
    <div class="chat-header">

        <div class="chat-header-info">

            <div class="chat-avatar">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                    <path d="M2 17l10 5 10-5"></path>
                    <path d="M2 12l10 5 10-5"></path>
                </svg>
            </div>

            <div>
                <div class="chat-header-title">Asisten PUSDAI</div>
                <div class="chat-header-status">
                    <span class="chat-status-dot"></span>
                    Online — Siap membantu
                </div>
            </div>

        </div>

        <button
            id="chat-close-btn"
            class="chat-close-btn"
            aria-label="Tutup Chat"
        >
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>

    </div>


    {{-- Chat Messages --}}
    <div id="chat-messages" class="chat-messages">

        {{-- Welcome Message --}}
        <div class="chat-message chat-bot">
            <div class="chat-bubble">
                <p>Assalamu'alaikum! 🕌</p>
                <p>Saya <strong>Asisten PUSDAI</strong>, siap membantu Anda mendapatkan informasi seputar Masjid Raya PUSDAI Jawa Barat.</p>
                <p>Saya bisa bantu soal layanan, jadwal shalat &amp; kajian, donasi, alamat, sampai pertanyaan dasar seputar ibadah dan ajaran Islam.</p>
            </div>
        </div>

        {{-- Quick Action Buttons --}}
        <div class="chat-quick-actions">
            <button class="chat-quick-btn" data-message="Apa saja layanan di PUSDAI?">
                🕌 Layanan PUSDAI
            </button>
            <button class="chat-quick-btn" data-message="Berapa jadwal shalat hari ini?">
                🕐 Jadwal Shalat
            </button>
            <button class="chat-quick-btn" data-message="Bagaimana cara donasi ke PUSDAI?">
                ❤️ Cara Donasi
            </button>
            <button class="chat-quick-btn" data-message="Dimana alamat PUSDAI dan bagaimana cara menghubungi?">
                📍 Alamat &amp; Kontak
            </button>
            <button class="chat-quick-btn" data-message="Jadwal kajian rutin di PUSDAI apa saja?">
                📖 Jadwal Kajian
            </button>
            <button class="chat-quick-btn" data-message="Bagaimana cara menghitung zakat?">
                🤲 Zakat
            </button>
        </div>

    </div>


    {{-- Chat Input --}}
    <div class="chat-input-area">

        <form id="chat-form" class="chat-form">
            @csrf

            <input
                type="text"
                id="chat-input"
                class="chat-input"
                placeholder="Ketik pertanyaan Anda..."
                autocomplete="off"
                maxlength="1000"
            >

            <button
                type="submit"
                id="chat-send-btn"
                class="chat-send-btn"
                aria-label="Kirim pesan"
            >
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="22" y1="2" x2="11" y2="13"></line>
                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                </svg>
            </button>

        </form>

        <div class="chat-powered">
            Powered by Gemini AI — PUSDAI Jawa Barat
        </div>

    </div>

</div>


{{-- Chat JavaScript --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    /* ================================
       ELEMENTS
    ================================= */

    const chatFab       = document.getElementById('chat-fab');
    const chatWindow    = document.getElementById('chat-window');
    const chatCloseBtn  = document.getElementById('chat-close-btn');
    const chatForm      = document.getElementById('chat-form');
    const chatInput     = document.getElementById('chat-input');
    const chatMessages  = document.getElementById('chat-messages');
    const chatSendBtn   = document.getElementById('chat-send-btn');
    const fabIcon       = document.getElementById('chat-fab-icon');
    const fabClose      = document.getElementById('chat-fab-close');
    const quickBtns     = document.querySelectorAll('.chat-quick-btn');

    let chatHistory = [];
    let isLoading   = false;


    /* ================================
       TOGGLE CHAT
    ================================= */

    function toggleChat() {
        const isHidden = chatWindow.classList.contains('chat-hidden');

        if (isHidden) {
            chatWindow.classList.remove('chat-hidden');
            chatWindow.classList.add('chat-visible');
            fabIcon.classList.add('chat-fab-hidden');
            fabClose.classList.remove('chat-fab-hidden');
            chatFab.classList.add('chat-fab-active');

            setTimeout(function () {
                chatInput.focus();
            }, 300);
        } else {
            chatWindow.classList.add('chat-hidden');
            chatWindow.classList.remove('chat-visible');
            fabIcon.classList.remove('chat-fab-hidden');
            fabClose.classList.add('chat-fab-hidden');
            chatFab.classList.remove('chat-fab-active');
        }
    }

    chatFab.addEventListener('click', toggleChat);
    chatCloseBtn.addEventListener('click', toggleChat);


    /* ================================
       SCROLL TO BOTTOM
    ================================= */

    function scrollToBottom() {
        setTimeout(function () {
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }, 50);
    }


    /* ================================
       ADD MESSAGE
    ================================= */

    function addMessage(text, sender) {
        // Hapus quick actions setelah pesan pertama user
        if (sender === 'user') {
            const quickActions = chatMessages.querySelector('.chat-quick-actions');
            if (quickActions) {
                quickActions.remove();
            }
        }

        const msgDiv = document.createElement('div');
        msgDiv.className = 'chat-message chat-' + sender;

        const bubble = document.createElement('div');
        bubble.className = 'chat-bubble';

        if (sender === 'bot') {
            // Parse markdown-like formatting
            bubble.innerHTML = formatMessage(text);
        } else {
            bubble.textContent = text;
        }

        msgDiv.appendChild(bubble);
        chatMessages.appendChild(msgDiv);
        scrollToBottom();

        return msgDiv;
    }


    /* ================================
       FORMAT MESSAGE (simple markdown)
    ================================= */

    function formatMessage(text) {
        // Escape HTML
        let html = text
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;');

        // Bold
        html = html.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');

        // Italic
        html = html.replace(/\*(.*?)\*/g, '<em>$1</em>');

        // Line breaks
        html = html.replace(/\n/g, '<br>');

        // Simple list items
        html = html.replace(/^- (.+)/gm, '• $1');

        return html;
    }


    /* ================================
       TYPING INDICATOR
    ================================= */

    function showTyping() {
        const typingDiv = document.createElement('div');
        typingDiv.className = 'chat-message chat-bot chat-typing-wrapper';
        typingDiv.id = 'chat-typing';

        typingDiv.innerHTML =
            '<div class="chat-bubble chat-typing">' +
                '<span class="chat-dot"></span>' +
                '<span class="chat-dot"></span>' +
                '<span class="chat-dot"></span>' +
            '</div>';

        chatMessages.appendChild(typingDiv);
        scrollToBottom();
    }

    function removeTyping() {
        const typing = document.getElementById('chat-typing');
        if (typing) {
            typing.remove();
        }
    }


    /* ================================
       SEND MESSAGE
    ================================= */

    async function sendMessage(message) {
        if (isLoading || !message.trim()) return;

        isLoading = true;
        chatSendBtn.disabled = true;
        chatInput.disabled = true;

        // Tampilkan pesan user
        addMessage(message, 'user');
        chatInput.value = '';

        // Tampilkan typing indicator
        showTyping();

        try {
            const response = await fetch('/api/chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                        || document.querySelector('input[name="_token"]')?.value
                        || '',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({
                    message: message,
                    history: chatHistory.slice(-16) // Kirim max 16 pesan terakhir
                }),
            });

            const data = await response.json();

            removeTyping();

            const reply = data.reply || 'Maaf, terjadi kendala. Silakan coba lagi.';
            addMessage(reply, 'bot');

            // Simpan ke riwayat
            chatHistory.push({ role: 'user', text: message });
            chatHistory.push({ role: 'model', text: reply });

            // Batasi riwayat
            if (chatHistory.length > 20) {
                chatHistory = chatHistory.slice(-20);
            }

        } catch (error) {
            removeTyping();
            addMessage(
                'Maaf, terjadi kesalahan koneksi. Pastikan Anda terhubung ke internet dan coba lagi. 🤲',
                'bot'
            );
        }

        isLoading = false;
        chatSendBtn.disabled = false;
        chatInput.disabled = false;
        chatInput.focus();
    }


    /* ================================
       EVENT LISTENERS
    ================================= */

    chatForm.addEventListener('submit', function (e) {
        e.preventDefault();
        sendMessage(chatInput.value);
    });

    // Quick action buttons
    quickBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            sendMessage(btn.dataset.message);
        });
    });

    // Enter to send, Shift+Enter for newline
    chatInput.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendMessage(chatInput.value);
        }
    });

    // Escape to close
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && chatWindow.classList.contains('chat-visible')) {
            toggleChat();
        }
    });

});
</script>
