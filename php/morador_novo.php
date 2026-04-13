<?php
header("Content-Type: application/json");
include("conexao.php");

$dados = json_decode(file_get_contents("php://input"));

if (
    empty($dados->nome) ||
    empty($dados->endereco) ||
    empty($dados->email) ||
    empty($dados->senha) ||
    empty($dados->telefone)
) {
    echo json_encode([
        "status" => false,
        "mensagem" => "Preencha todos os campos."
    ]);
    exit;
}

$nome = $conexao->real_escape_string($dados->nome);
$endereco = $conexao->real_escape_string($dados->endereco);
$email = $conexao->real_escape_string($dados->email);
$senha = password_hash($dados->senha, PASSWORD_DEFAULT);
$telefone = $conexao->real_escape_string($dados->telefone);

$verifica = $conexao->query("SELECT id FROM morador WHERE email = '$email'");

if ($verifica->num_rows > 0) {
    echo json_encode([
        "status" => false,
        "mensagem" => "Este e-mail já está cadastrado."
    ]);
    exit;
}

$sql = "INSERT INTO morador (nome, endereco, email, senha, telefone)
VALUES ('$nome', '$endereco', '$email', '$senha', '$telefone')";

if ($conexao->query($sql) === TRUE) {
    echo json_encode([
        "status" => true,
        "mensagem" => "Cadastrado com sucesso."
    ]);
} else {
    echo json_encode([
        "status" => false,
        "mensagem" => "Erro ao cadastrar."
    ]);
}
?>