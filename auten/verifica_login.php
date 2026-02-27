<?php
session_start();

$usuario_correto = "admin";
$senha_correta = "123";

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

if($usuario == $usuario_correto && $senha == $senha_correta){
    $_SESSION['usuario'] = $usuario;
    header("Location: /projeto-futebol/auten/login.php?erro=1");
exit();
} else {
    echo "Usuário ou senha inválidos";
}
?>