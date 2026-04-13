<?php
include("conexao.php");

if (!isset($_GET["id"])) {
    die("ID não informado.");
}

$id = (int)$_GET["id"];

$sql = "SELECT * FROM morador WHERE id = $id";
$resultado = $conexao->query($sql);

if ($resultado->num_rows == 0) {
    die("Morador não encontrado.");
}

$morador = $resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Morador</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h1>Editar Morador</h1>

    <form action="atualizar.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $morador['id']; ?>">

        <input type="text" name="nome" value="<?php echo $morador['nome']; ?>">
        <input type="text" name="endereco" value="<?php echo $morador['endereco']; ?>">
        <input type="email" name="email" value="<?php echo $morador['email']; ?>">
        <input type="text" name="telefone" value="<?php echo $morador['telefone']; ?>">

        <button type="submit">Atualizar</button>
    </form>

    <div class="acoes-centro">
        <a class="novo" href="../home/lista.php">Voltar para lista</a>
    </div>
</div>

</body>
</html>