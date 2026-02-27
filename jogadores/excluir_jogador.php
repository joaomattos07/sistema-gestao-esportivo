<?php
include("../auten/proteger.php");
include("../config/conexao.php");


if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM jogadores WHERE id = $id";

    if($conexao->query($sql)){
        header("Location: /projeto-futebol/jogadores/listar_jogadores.php");
    } else {
        echo "Erro ao excluir.";
    }
}
?>