<?php
session_start();
$erro = isset($_GET['erro']) ? true : false;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="/projeto-futebol/css/login.css">
</head>
<body>

  <div class="login-card">
    <h1>Bem-vindo </h1>
    <p>Entre para acessar o sistema de gestão esportivo.</p>

    <form action="/projeto-futebol/auten/verifica_login.php" method="POST">
      <label>Usuário</label>
      <input type="text" name="usuario" placeholder="Ex: admin" required>

      <label>Senha</label>
      <input type="password" name="senha" placeholder="Sua senha" required>

      <button type="submit">Entrar</button>

      <?php if($erro){ ?>
        <div class="erro">Usuário ou senha inválidos.</div>
      <?php } ?>
    </form>
  </div>

</body>
</html>