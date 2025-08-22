import { serve } from "bun";

const clients = new Set();

serve({
  port: 3000,
  websocket: {
    open(ws) {
      clients.add(ws);
      console.log("Client connected");
    },
    message(ws,msg) {
      for(const client of clients){
        if(client.readyState===1) client.send(msg);
      }
    },
    close(ws) {
      clients.delete(ws);
      console.log("Client disconnected");
    }
  }
});
