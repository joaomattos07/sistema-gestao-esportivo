<?php
include("../auten/proteger.php");
include("../config/conexao.php");


$sql = "SELECT * FROM jogadores ORDER BY numero ASC";
$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Jogadores</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
<?php include("../menu.php"); ?>
<div class="container">

<h2>Lista de Jogadores</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Número</th>
        <th>Posição</th>
        <th>Status</th>
        <th>Ações</th>
    </tr>

    <?php while($jogador = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $jogador['id']; ?></td>
            <td><?php echo $jogador['nome']; ?></td>
            <td><?php echo $jogador['numero']; ?></td>
            <td><?php echo $jogador['posicao']; ?></td>
            <td><?php echo $jogador['status']; ?></td>
            <td>
    <a href="/projeto-futebol/jogadores/editar_jogador.php?id=<?php echo $jogador['id']; ?>">
        Editar
    </a> |
    <a href="/projeto-futebol/jogadores/excluir_jogador.php?id=<?php echo $jogador['id']; ?>">
        Excluir
    </a>
</td>
        </tr>
    <?php } ?>
</table>

<br>
<a href="/projeto-futebol/jogadores/cadastrar_jogador.php">Cadastrar novo jogador</a>
</div>
</body>
</html>