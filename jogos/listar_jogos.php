<?php
include("../auten/proteger.php");
include("../config/conexao.php");


$sql = "SELECT * FROM jogos ORDER BY data_jogo DESC";
$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Jogos</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
<?php include("../menu.php"); ?>
<div class="container">

<h2>Lista de Jogos</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Adversário</th>
        <th>Data</th>
        <th>Local</th>
        <th>Placar</th>
        <th>Ações</th>
</tr>
    </tr>

    <?php while($jogo = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $jogo['id']; ?></td>
            <td><?php echo $jogo['adversario']; ?></td>
            <td><?php echo $jogo['data_jogo']; ?></td>
            <td><?php echo $jogo['local']; ?></td>
            <td>
                <?php echo $jogo['placar_time']; ?> x 
                <?php echo $jogo['placar_adversario']; ?>
                <td>
    <a href="/projeto-futebol/jogos/editar_jogo.php?id=<?php echo $jogo['id']; ?>">Editar</a>
    |
    <a href="/projeto-futebol/jogos/excluir_jogo.php?id=<?php echo $jogo['id']; ?>">Excluir</a>
</td>
            </td>
        </tr>
    <?php } ?>
</table>

<br>
<a href="/projeto-futebol/jogos/cadastrar_jogo.php">Cadastrar novo jogo</a>
</div>
</body>
</html>