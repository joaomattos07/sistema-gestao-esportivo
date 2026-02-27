<?php
include("../auten/proteger.php");
include("../config/conexao.php");


if(!isset($_GET['id'])){
    header("Location: /projeto-futebol/jogos/listar_jogos.php");
    exit();
}

$id = (int) $_GET['id'];

// Buscar jogo
$sql = "SELECT * FROM jogos WHERE id = $id";
$res = $conexao->query($sql);
$jogo = $res->fetch_assoc();

if(!$jogo){
    header("Location: /projeto-futebol/jogos/listar_jogos.php");
    exit();
}

// Atualizar
if(isset($_POST['adversario'])){
    $adversario = $_POST['adversario'];
    $data_jogo = $_POST['data_jogo'];
    $local = $_POST['local'];
    $placar_time = (int) $_POST['placar_time'];
    $placar_adversario = (int) $_POST['placar_adversario'];

    $up = "UPDATE jogos SET 
            adversario='$adversario',
            data_jogo='$data_jogo',
            local='$local',
            placar_time=$placar_time,
            placar_adversario=$placar_adversario
          WHERE id=$id";

    if($conexao->query($up)){
        header("Location: /projeto-futebol/jogos/listar_jogos.php");
        exit();
    } else {
        echo "Erro ao atualizar jogo.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Editar Jogo</title>
  <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>

<?php include("../menu.php"); ?>

<div class="container">
  <h2>Editar Jogo</h2>

  <form method="POST">
    Adversário:
    <input type="text" name="adversario" value="<?php echo $jogo['adversario']; ?>" required>

    Data:
    <input type="date" name="data_jogo" value="<?php echo $jogo['data_jogo']; ?>" required>

    Local:
    <input type="text" name="local" value="<?php echo $jogo['local']; ?>" required>

    Placar Time:
    <input type="number" name="placar_time" value="<?php echo $jogo['placar_time']; ?>" min="0" required>

    Placar Adversário:
    <input type="number" name="placar_adversario" value="<?php echo $jogo['placar_adversario']; ?>" min="0" required>

    <button type="submit">Salvar</button>
  </form>
</div>

</body>
</html>