<?php
include("../auten/proteger.php");
include("../config/conexao.php");


$sql = "SELECT 
            gols.id,
            jogadores.nome AS jogador,
            jogos.adversario,
            jogos.data_jogo,
            gols.quantidade
        FROM gols
        INNER JOIN jogadores ON gols.jogador_id = jogadores.id
        INNER JOIN jogos ON gols.jogo_id = jogos.id
        ORDER BY gols.id DESC";

$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gols</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>

<?php include("../menu.php"); ?>

<div class="container">
    <h2>Lista de Gols</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Jogador</th>
            <th>Jogo</th>
            <th>Data</th>
            <th>Gols</th>
            <th>Ações</th>
        </tr>

        <?php while($g = $resultado->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $g['id']; ?></td>
                <td><?php echo $g['jogador']; ?></td>
                <td><?php echo $g['adversario']; ?></td>
                <td><?php echo $g['data_jogo']; ?></td>
                <td><?php echo $g['quantidade']; ?></td>
                <td>
                    <a href="/projeto-futebol/gols/editar_gol.php?id=<?php echo $g['id']; ?>">Editar</a>
                    |
                    <a href="/projeto-futebol/gols/excluir_gol.php?id=<?php echo $g['id']; ?>" onclick="return confirm('Tem certeza?');">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <br>
    <a href="/projeto-futebol/gols/registrar_gol.php">Registrar novo gol</a>
</div>

</body>
</html>