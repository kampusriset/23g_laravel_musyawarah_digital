import { serve } from "bun";

// Menyimpan semua client WebSocket
const clients = new Set();

const server = serve({
  port: 3000,
  fetch(req) {
    return new Response("WebSocket server running");
  },
  websocket: {
    open(ws) {
      console.log("New client connected");
      clients.add(ws);
    },
    message(ws, message) {
      try {
        const data = JSON.parse(message);
        // Broadcast ke semua client kecuali pengirim
        clients.forEach(client => {
          if (client !== ws && client.readyState === 1) {
            client.send(JSON.stringify(data));
          }
        });
      } catch (e) {
        console.error("Invalid message:", message);
      }
    },
    close(ws) {
      console.log("Client disconnected");
      clients.delete(ws);
    }
  }
});

console.log("WebSocket server listening on ws://localhost:3000");
