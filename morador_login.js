document.getElementById("formLogin").addEventListener("submit", async function(e){
    e.preventDefault();

    const dados = {
        email: document.getElementById("email").value.trim(),
        senha: document.getElementById("senha").value.trim()
    };

    const msg = document.getElementById("mensagem");

    if (!dados.email || !dados.senha) {
        msg.innerText = "Preencha.";
        return;
    }

    try {
        const resposta = await fetch("../php/morador_login.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(dados)
        });

        const resultado = await resposta.json();

        msg.innerText = resultado.mensagem;
        msg.style.color = resultado.status ? "green" : "red";

        if (resultado.status) {
            setTimeout(() => {
                window.location.href = "../home/lista.php";
            }, 1000);
        }

    } catch (erro) {
        msg.innerText = "Erro ao conectar com o servidor.";
        msg.style.color = "red";
    }
});