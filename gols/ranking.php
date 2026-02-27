<?php
include("../auten/proteger.php");
include("../config/conexao.php");


$sql = "SELECT jogadores.nome, SUM(gols.quantidade) as total_gols
        FROM gols
        INNER JOIN jogadores ON gols.jogador_id = jogadores.id
        GROUP BY jogadores.nome
        ORDER BY total_gols DESC";

$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ranking de Artilharia</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
<?php include("../menu.php"); ?>
<div class="container">

<h2>Ranking de Artilharia</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>Jogador</th>
        <th>Total de Gols</th>
    </tr>

    <?php while($row = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['nome']; ?></td>
            <td><?php echo $row['total_gols']; ?></td>
        </tr>
    <?php } ?>

</table>
</div>
</body>
</html>