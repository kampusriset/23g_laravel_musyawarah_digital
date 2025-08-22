let votingSocket;

function initVoting(url,userId){
    votingSocket = new WebSocket(url);

    votingSocket.onopen = ()=>console.log('Voting WebSocket connected');

    votingSocket.onmessage = (msg)=>{
        const data = JSON.parse(msg.data);
        const div = document.querySelector(`[data-id='${data.id}']`);
        if(div) div.querySelector('.vote-result').innerText = data.pilihan;
    };

    document.querySelectorAll('.vote-btn').forEach(btn=>{
        btn.onclick = ()=>{
            const div = btn.closest('[data-id]');
            const id = div.dataset.id;
            const choice = btn.dataset.choice;
            votingSocket.send(JSON.stringify({type:'vote',id:id,pilihan:choice,user:userId}));
        };
    });
}
