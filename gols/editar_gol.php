<?php
include("../auten/proteger.php");
include("../config/conexao.php");


if(!isset($_GET['id'])){
    header("Location: /projeto-futebol/gols/listar_gols.php");
    exit();
}

$id = (int) $_GET['id'];

// busca o gol atual
$res = $conexao->query("SELECT * FROM gols WHERE id = $id");
$gol = $res->fetch_assoc();
if(!$gol){
    header("Location: /projeto-futebol/gols/listar_gols.php");
    exit();
}

// listas para selects
$jogadores = $conexao->query("SELECT id, nome FROM jogadores WHERE status='ativo' ORDER BY nome ASC");
$jogos = $conexao->query("SELECT id, adversario, data_jogo FROM jogos ORDER BY data_jogo DESC");

// atualizar
if(isset($_POST['jogador_id'])){
    $jogador_id = (int) $_POST['jogador_id'];
    $jogo_id = (int) $_POST['jogo_id'];
    $quantidade = (int) $_POST['quantidade'];

    $up = "UPDATE gols SET 
            jogador_id=$jogador_id,
            jogo_id=$jogo_id,
            quantidade=$quantidade
          WHERE id=$id";

    if($conexao->query($up)){
        header("Location: /projeto-futebol/gols/listar_gols.php");
        exit();
    } else {
        echo "Erro ao atualizar gol.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Gol</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>

<?php include("../menu.php"); ?>

<div class="container">
    <h2>Editar Gol</h2>

    <form method="POST">
        Jogador:
        <select name="jogador_id" required>
            <?php while($j = $jogadores->fetch_assoc()) { ?>
                <option value="<?php echo $j['id']; ?>" <?php echo ($j['id'] == $gol['jogador_id']) ? 'selected' : ''; ?>>
                    <?php echo $j['nome']; ?>
                </option>
            <?php } ?>
        </select>

        Jogo:
        <select name="jogo_id" required>
            <?php while($jg = $jogos->fetch_assoc()) { ?>
                <option value="<?php echo $jg['id']; ?>" <?php echo ($jg['id'] == $gol['jogo_id']) ? 'selected' : ''; ?>>
                    <?php echo $jg['adversario']; ?> - <?php echo $jg['data_jogo']; ?>
                </option>
            <?php } ?>
        </select>

        Quantidade de gols:
        <input type="number" name="quantidade" min="1" value="<?php echo (int)$gol['quantidade']; ?>" required>

        <button type="submit">Salvar</button>
    </form>
</div>

</body>
</html>