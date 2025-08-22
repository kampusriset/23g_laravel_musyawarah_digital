let socket;

function initChat(url, userId) {
    // Debug the parameters
    console.log('initChat called with:', {url, userId});
    console.log('url type:', typeof url);
    console.log('userId type:', typeof userId);
    
    // Validate parameters
    if (!url || typeof url !== 'string') {
        console.error('Invalid WebSocket URL:', url);
        return;
    }
    
    if (!userId || typeof userId !== 'number') {
        console.error('Invalid user ID:', userId);
        return;
    }
    
    try {
        socket = new WebSocket(url);

        socket.onopen = () => {
            console.log('WebSocket connected to:', url);
            showStatus('Terhubung', 'success');
        };

        socket.onmessage = (msg) => {
            try {
                const data = JSON.parse(msg.data);
                console.log('Received message:', data);
                
                const chatBox = document.getElementById('chat-box');
                
                // Enhanced message display
                const messageDiv = document.createElement('div');
                messageDiv.className = 'mb-2 p-2 bg-gray-50 rounded';
                messageDiv.innerHTML = `
                    <span class="font-semibold text-blue-600">Warga ${data.warga_id}:</span> 
                    <span class="text-gray-800">${escapeHtml(data.pesan)}</span>
                    <span class="text-xs text-gray-500 ml-2">${new Date().toLocaleTimeString()}</span>
                `;
                
                chatBox.appendChild(messageDiv);
                chatBox.scrollTop = chatBox.scrollHeight;
            } catch (error) {
                console.error('Error parsing message:', error);
            }
        };

        socket.onclose = (event) => {
            console.log('WebSocket disconnected. Code:', event.code, 'Reason:', event.reason);
            showStatus('Terputus', 'error');
        };

        socket.onerror = (error) => {
            console.error('WebSocket error:', error);
            console.error('WebSocket state:', socket.readyState);
            showStatus('Error koneksi', 'error');
        };

        // Setup send button
        const sendBtn = document.getElementById('send-btn');
        const chatInput = document.getElementById('chat-input');
        
        if (sendBtn && chatInput) {
            sendBtn.onclick = () => {
                const message = chatInput.value.trim();
                if (message === '') return;
                
                if (socket.readyState === WebSocket.OPEN) {
                    const messageData = {
                        warga_id: userId, 
                        pesan: message
                    };
                    
                    console.log('Sending message:', messageData);
                    socket.send(JSON.stringify(messageData));
                    chatInput.value = '';
                } else {
                    console.error('WebSocket not ready. State:', socket.readyState);
                    showStatus('Tidak terhubung', 'error');
                }
            };
        } else {
            console.error('Send button or input not found');
        }
        
    } catch (error) {
        console.error('Error creating WebSocket:', error);
        showStatus('Error membuat koneksi', 'error');
    }
}

// Helper functions
function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

function showStatus(message, type) {
    console.log(`Status: ${message} (${type})`);
    
    // Try to show status in UI if element exists
    const statusElement = document.getElementById('status');
    if (statusElement) {
        statusElement.textContent = message;
        statusElement.className = type === 'success' ? 'text-green-600 text-sm' : 'text-red-600 text-sm';
    }
}