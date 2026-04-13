<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (int)$_POST["id"];
    $nome = $conexao->real_escape_string($_POST["nome"]);
    $endereco = $conexao->real_escape_string($_POST["endereco"]);
    $email = $conexao->real_escape_string($_POST["email"]);
    $telefone = $conexao->real_escape_string($_POST["telefone"]);

    $sql = "UPDATE morador
            SET nome='$nome', endereco='$endereco', email='$email', telefone='$telefone'
            WHERE id=$id";

    if ($conexao->query($sql) === TRUE) {
        header("Location: ../home/lista.php");
        exit;
    } else {
        echo "Erro ao atualizar morador.";
    }
}
?>