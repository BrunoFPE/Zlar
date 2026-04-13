<?php
include("conexao.php");

if (!isset($_GET["id"])) {
    die("ID não informado.");
}

$id = (int)$_GET["id"];

$sql = "DELETE FROM morador WHERE id = $id";

if ($conexao->query($sql) === TRUE) {
    header("Location: ../home/lista.php");
    exit;
} else {
    echo "Erro ao excluir morador.";
}
?>