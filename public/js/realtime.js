let ws = new WebSocket("ws://localhost:3000");

ws.onmessage = e=>{
    let data = JSON.parse(e.data);

    if(data.type==='chat'){
        let el = document.querySelector(`#chat-msg-${data.id}`);
        if(el) el.classList.add('bg-yellow-500');
        if(data.text.includes('@{{ Auth::user()->username ?? "" }}')){
            if(Notification.permission==='granted'){
                new Notification("Mention", {body: data.text});
            }
        }
    }

    if(data.type==='notulen'){
        let el = document.querySelector(`#notulen-${data.id}`);
        if(el) el.innerText = data.content;
    }

    if(data.type==='voting'){
        let el = document.querySelector(`#voting-${data.id}`);
        if(el) el.innerText = data.counts;
    }

    if(data.type==='presensi'){
        let el = document.querySelector(`#presensi-${data.id}`);
        if(el) el.innerText = data.count;
    }
};

if(Notification.permission!=='granted'){ Notification.requestPermission(); }
