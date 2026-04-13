<?php
header("Content-Type: application/json");
include("conexao.php");

$dados = json_decode(file_get_contents("php://input"));

if (empty($dados->email) || empty($dados->senha)) {
    echo json_encode([
        "status" => false,
        "mensagem" => "Preencha e-mail e senha."
    ]);
    exit;
}

$email = $conexao->real_escape_string($dados->email);
$senha = $dados->senha;

$sql = "SELECT * FROM morador WHERE email = '$email' LIMIT 1";
$resultado = $conexao->query($sql);

if ($resultado->num_rows === 0) {
    echo json_encode([
        "status" => false,
        "mensagem" => "E-mail ou senha inválidos."
    ]);
    exit;
}

$morador = $resultado->fetch_assoc();

if (password_verify($senha, $morador["senha"])) {
    echo json_encode([
        "status" => true,
        "mensagem" => "Login realizado com sucesso."
    ]);
} else {
    echo json_encode([
        "status" => false,
        "mensagem" => "E-mail ou senha inválidos."
    ]);
}
?>