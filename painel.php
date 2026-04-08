<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Painel</title>
</head>
<body>

<h1>Bem-vindo ao Zlar</h1>
<p>Você está logado como: <?php echo $_SESSION['email']; ?></p>

<a href="logout.php">Sair</a>

</body>
</html>