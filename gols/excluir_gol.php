<?php
include("../auten/proteger.php");
include("../config/conexao.php");


if(!isset($_GET['id'])){
    header("Location: /projeto-futebol/gols/listar_gols.php");
    exit();
}

$id = (int) $_GET['id'];

$conexao->query("DELETE FROM gols WHERE id = $id");

header("Location: /projeto-futebol/gols/listar_gols.php");
exit();
?>