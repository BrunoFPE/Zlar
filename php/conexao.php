<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "zlar";

$conexao = new mysqli($host, $user, $password, $db);

if ($conexao->connect_error) {
    die("Erro: " . $conexao->connect_error);
}
?>