<?php
include("../auten/proteger.php");
include("../config/conexao.php");


if(!isset($_GET['id'])){
    header("Location: /projeto-futebol/jogos/listar_jogos.php");
    exit();
}

$id = (int) $_GET['id'];

$sql = "DELETE FROM jogos WHERE id = $id";

if($conexao->query($sql)){
    header("Location: /projeto-futebol/jogos/listar_jogos.php");
    exit();
} else {
    echo "Erro ao excluir jogo.";
}
?>