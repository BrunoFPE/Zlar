<?php
session_start();
include("conexao.php");

$email = $_POST['email'];
$senha = md5($_POST['senha']);

$sql = "SELECT * FROM morador WHERE email = ? AND senha = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $senha);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $_SESSION['email'] = $email;
    header("Location: painel.php");
} else {
    echo "Email ou senha incorretos!";
}
?>