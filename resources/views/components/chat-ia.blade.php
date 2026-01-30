<div id="btn-ia">💊</div>

<div id="chat-ia">
    <div id="chat-title">Asistente de Farmacia</div>
    <div id="chat-body"></div>
    <input type="text" id="msg-ia" placeholder="Escribe tu pregunta...">
    <button onclick="enviarIA()">Enviar</button>
</div>

<style>
#btn-ia {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: #2563eb;
    color: white;
    border-radius: 50%;
    width: 55px;
    height: 55px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 22px;
    cursor: pointer;
    z-index: 9999;
}

#chat-ia {
    position: fixed;
    bottom: 85px;
    right: 20px;
    width: 320px;
    background: white;
    border: 1px solid #ddd;
    border-radius: 10px;
    display: none;
    flex-direction: column;
    z-index: 9999;
}

#chat-title {
    background: #2563eb;
    color: white;
    padding: 10px;
    border-radius: 10px 10px 0 0;
}

#chat-body {
    height: 220px;
    overflow-y: auto;
    padding: 10px;
    font-size: 14px;
}

#msg-ia {
    width: 100%;
    border: none;
    border-top: 1px solid #ddd;
    padding: 8px;
}
</style>

<script>
document.getElementById("btn-ia").onclick = () => {
    let chat = document.getElementById("chat-ia");
    chat.style.display = chat.style.display === "flex" ? "none" : "flex";
};

async function enviarIA() {
    let input = document.getElementById("msg-ia");
    let texto = input.value.trim();
    if (!texto) return;

    let chat = document.getElementById("chat-body");
    chat.innerHTML += `<div><b>Tú:</b> ${texto}</div>`;

    try {
        let res = await fetch("http://127.0.0.1:8000/ia-farmacia", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ message: texto })
        });

        let data = await res.json();
        chat.innerHTML += `<div><b>IA:</b> ${data.reply}</div>`;
    } catch (e) {
        chat.innerHTML += `<div><b>IA:</b> Error al conectar.</div>`;
    }

    input.value = "";
}
</script>
