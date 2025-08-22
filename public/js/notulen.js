let notulenSocket;

function initNotulen(url,userId){
    notulenSocket = new WebSocket(url);

    notulenSocket.onopen = ()=>console.log('Notulensi WebSocket connected');

    notulenSocket.onmessage = (msg)=>{
        const data = JSON.parse(msg.data);
        const div = document.querySelector(`[data-id='${data.id}']`);
        if(div) div.querySelector('textarea').value = data.catatan;
        else {
            const list = document.getElementById('notulen-list');
            const html = `<div data-id="${data.id}" class="border p-3 rounded bg-gray-800">
                <h3 class="font-semibold">${data.judul_musyawarah}</h3>
                <textarea class="w-full bg-gray-700 text-white p-2 rounded">${data.catatan}</textarea>
            </div>`;
            list.innerHTML += html;
        }
    };

    document.getElementById('add-notulen').onclick = ()=>{
        const judul = document.getElementById('notulen-judul').value;
        if(!judul) return;
        notulenSocket.send(JSON.stringify({type:'add',judul:judul,catatan:''}));
        document.getElementById('notulen-judul').value='';
    };

    document.querySelectorAll('#notulen-list textarea').forEach(el=>{
        el.addEventListener('input',e=>{
            const id = el.closest('[data-id]').dataset.id;
            notulenSocket.send(JSON.stringify({type:'update',id:id,catatan:el.value}));
        });
    });
}
