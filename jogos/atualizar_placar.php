<?php
include("../auten/proteger.php");
include("../config/conexao.php");


$id = $_POST['id'];
$time_casa = $_POST['time_casa'];
$time_fora = $_POST['time_fora'];
$placar_casa = $_POST['placar_time'];
$placar_adversario = $_POST['placar_adversario'];

$sql = "UPDATE jogos SET 
        time_casa='$time_casa',
        time_fora='$time_fora',
        placar_time='$placar_time',
        placar_adversario='$placar_adversario'
        WHERE id=$id";

mysqli_query($conn, $sql);

header("Location: /projeto-futebol/jogos/listar_jogos.php");
?>