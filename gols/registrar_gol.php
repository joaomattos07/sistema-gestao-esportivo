<?php
include("../auten/proteger.php");
include("../config/conexao.php");


// Buscar jogadores
$jogadores = $conexao->query("SELECT * FROM jogadores WHERE status='ativo'");

// Buscar jogos
$jogos = $conexao->query("SELECT * FROM jogos");

if(isset($_POST['jogador_id'])){

    $jogador_id = $_POST['jogador_id'];
    $jogo_id = $_POST['jogo_id'];
    $quantidade = $_POST['quantidade'];

    $sql = "INSERT INTO gols (jogador_id, jogo_id, quantidade)
            VALUES ('$jogador_id', '$jogo_id', '$quantidade')";

    if($conexao->query($sql)){
        echo "Gol registrado com sucesso!";
    } else {
        echo "Erro ao registrar gol.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrar Gol</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
<?php include("../menu.php"); ?>
<div class="container">


<h2>Registrar Gol</h2>

<form method="POST">

    Jogador: <br>
    <select name="jogador_id" required>
        <?php while($j = $jogadores->fetch_assoc()) { ?>
            <option value="<?php echo $j['id']; ?>">
                <?php echo $j['nome']; ?>
            </option>
        <?php } ?>
    </select>
    <br><br>

    Jogo: <br>
    <select name="jogo_id" required>
        <?php while($jg = $jogos->fetch_assoc()) { ?>
            <option value="<?php echo $jg['id']; ?>">
                <?php echo $jg['adversario']; ?> - <?php echo $jg['data_jogo']; ?>
            </option>
        <?php } ?>
    </select>
    <br><br>

    Quantidade de Gols: <br>
    <input type="number" name="quantidade" min="1" required>
    <br><br>

    <button type="submit">Registrar</button>

</form>
</div>
</body>
</html>