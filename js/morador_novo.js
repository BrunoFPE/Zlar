document.getElementById("formMorador").addEventListener("submit", async function(e){
    e.preventDefault();

    const dados = {
        nome: document.getElementById("nome").value.trim(),
        endereco: document.getElementById("endereco").value.trim(),
        email: document.getElementById("email").value.trim(),
        senha: document.getElementById("senha").value.trim(),
        telefone: document.getElementById("telefone").value.trim()
    };

    const msg = document.getElementById("mensagem");

    if (!dados.nome || !dados.endereco || !dados.email || !dados.senha || !dados.telefone) {
        msg.innerText = "Preencha todos os campos.";
        msg.style.color = "red";
        return;
    }

    const resposta = await fetch("../php/morador_novo.php", {
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
        document.getElementById("formMorador").reset();
    }
});