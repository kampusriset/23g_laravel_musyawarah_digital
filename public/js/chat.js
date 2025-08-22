let socket;
function initChat(url,userId){
    socket = new WebSocket(url);

    socket.onopen = ()=>console.log('WebSocket connected');
    socket.onmessage = (msg)=>{
        const data = JSON.parse(msg.data);
        const chatBox = document.getElementById('chat-box');
        chatBox.innerHTML += `<div>${data.warga_id}: ${data.pesan}</div>`;
        chatBox.scrollTop = chatBox.scrollHeight;
    };

    document.getElementById('send-btn').onclick = ()=>{
        const input = document.getElementById('chat-input');
        if(input.value.trim()=='') return;
        socket.send(JSON.stringify({warga_id:userId,pesan:input.value}));
        input.value='';
    };
}
