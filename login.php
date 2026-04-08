<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Login - Zlar</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Login Morador</h2>

    <form action="validar_login.php" method="POST">
        <input type="email" name="email" placeholder="Digite seu email" required>
        <input type="password" name="senha" placeholder="Digite sua senha" required>

        <button type="submit">Entrar</button>
    </form>
</div>

</body>
</html>