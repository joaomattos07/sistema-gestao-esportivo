<?php
include("../auten/proteger.php");
include("../config/conexao.php");


if(isset($_POST['nome'])){

    $nome = $_POST['nome'];
    $numero = $_POST['numero'];
    $posicao = $_POST['posicao'];

    $sql = "INSERT INTO jogadores (nome, numero, posicao) 
            VALUES ('$nome', '$numero', '$posicao')";

    if($conexao->query($sql)){
        echo "Jogador cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Jogador</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    
<?php include("../menu.php"); ?>
<div class="container">

<h2>Cadastrar Jogador</h2>

<form method="POST">
    Nome: <br>
    <input type="text" name="nome" required><br><br>

    Número: <br>
    <input type="number" name="numero" required><br><br>

    Posição: <br>
    <input type="text" name="posicao" required><br><br>

    <button type="submit">Cadastrar</button>
</form>
</div>
</body>
</html>