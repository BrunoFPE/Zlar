<?php
include("../php/conexao.php");

$sql = "SELECT * FROM morador ORDER BY id DESC";
$resultado = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moradores cadastrados</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h2>Moradores cadastrados</h2>

<div class="topo">
    <a class="novo" href="cadastro_morador.html">Cadastrar novo morador</a>
</div>

<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Endereço</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Ações</th>
    </tr>

    <?php if ($resultado->num_rows > 0): ?>
        <?php while($linha = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?php echo $linha["id"]; ?></td>
                <td><?php echo $linha["nome"]; ?></td>
                <td><?php echo $linha["endereco"]; ?></td>
                <td><?php echo $linha["email"]; ?></td>
                <td><?php echo $linha["telefone"]; ?></td>
                <td>
                    <a class="editar" href="../php/editar.php?id=<?php echo $linha['id']; ?>">Editar</a>
                    <a class="excluir" href="../php/excluir.php?id=<?php echo $linha['id']; ?>" onclick="return confirm('Deseja realmente excluir este morador?')">Excluir</a>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="6">Nenhum morador cadastrado.</td>
        </tr>
    <?php endif; ?>
</table>

</body>
</html>