<?php
include("../auten/proteger.php");
include("../config/conexao.php");


if(isset($_POST['adversario'])){

    $adversario = $_POST['adversario'];
    $data_jogo = $_POST['data_jogo']; // ✅ nome certo da coluna
    $local = $_POST['local'];

    $placar_time = $_POST['placar_time']; // ✅ pega do POST
    $placar_adversario = $_POST['placar_adversario']; // ✅ pega do POST

    $sql = "INSERT INTO jogos (adversario, data_jogo, local, placar_time, placar_adversario)
            VALUES ('$adversario', '$data_jogo', '$local', '$placar_time', '$placar_adversario')";

    if($conexao->query($sql)){
        header("Location: /projeto-futebol/jogos/listar_jogos.php");
        exit();
    } else {
        echo "Erro ao cadastrar jogo.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Jogo</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
<?php include("../menu.php"); ?>
<div class="container">

<h2>Cadastrar Jogo</h2>

<form method="POST">
    Placar Time:
<input type="number" name="placar_time" value="0" min="0"><br><br>

    Placar Adversário:
<input type="number" name="placar_adversario" value="0" min="0"><br><br>
    
    Adversário: <br>
    <input type="text" name="adversario" required><br><br>

    Data do Jogo: <br>
    <input type="date" name="data_jogo" required><br><br>

    Local: <br>
    <input type="text" name="local" required><br><br>

    <button type="submit">Cadastrar</button>
   
</form>

<br>
<a href="/projeto-futebol/jogos/listar_jogos.php">Ver Jogos</a>
</div>
</body>
</html>