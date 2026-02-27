<?php
include("../auten/proteger.php");
include("../config/conexao.php");


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM jogadores WHERE id = $id";
    $resultado = $conexao->query($sql);
    $jogador = $resultado->fetch_assoc();
}

if(isset($_POST['nome'])){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $numero = $_POST['numero'];
    $posicao = $_POST['posicao'];

    $sql = "UPDATE jogadores 
            SET nome='$nome', numero='$numero', posicao='$posicao'
            WHERE id=$id";

    if($conexao->query($sql)){
        header("Location: /projeto-futebol/jogadores/listar_jogadores.php");
    } else {
        echo "Erro ao atualizar.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Jogador</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
<?php include("../menu.php"); ?>
<div class="container">

<h2>Editar Jogador</h2>

<form method="POST">
    <input type="hidden" name="id" value="<?php echo $jogador['id']; ?>">

    Nome: <br>
    <input type="text" name="nome" 
        value="<?php echo $jogador['nome']; ?>" required><br><br>

    Número: <br>
    <input type="number" name="numero" 
        value="<?php echo $jogador['numero']; ?>" required><br><br>

    Posição: <br>
    <input type="text" name="posicao" 
        value="<?php echo $jogador['posicao']; ?>" required><br><br>

    <button type="submit">Atualizar</button>
</form>
</div>
</body>
</html>