<?php
include("auten/proteger.php");
include("config/conexao.php");


// Total jogadores
$jogadores = $conexao->query("SELECT COUNT(*) as total FROM jogadores");
$total_jogadores = $jogadores->fetch_assoc()['total'];

// Total jogos
$jogos = $conexao->query("SELECT COUNT(*) as total FROM jogos");
$total_jogos = $jogos->fetch_assoc()['total'];

// Total gols
$gols = $conexao->query("SELECT SUM(quantidade) as total FROM gols");
$total_gols = $gols->fetch_assoc()['total'] ?? 0;

// Artilheiro
$artilheiro = $conexao->query("
    SELECT jogadores.nome, SUM(gols.quantidade) as total
    FROM gols
    INNER JOIN jogadores ON gols.jogador_id = jogadores.id
    GROUP BY jogadores.nome
    ORDER BY total DESC
    LIMIT 1
");

$top = $artilheiro->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<link rel="stylesheet" href="/projeto-futebol/css/estilo.css">
<body>
<?php include("menu.php"); ?>
<div class="container">



<div class="container">
    

    <div class="stats">
        <div class="stat-box">
            <h2><?php echo $total_jogadores; ?></h2>
            <p>Jogadores</p>
        </div>

        <div class="stat-box">
            <h2><?php echo $total_jogos; ?></h2>
            <p>Jogos</p>
        </div>

        <div class="stat-box">
            <h2><?php echo $total_gols; ?></h2>
            <p>Gols</p>
        </div>
    </div>

    <?php if($top){ ?>
        <div class="card">
            <h2>Artilheiro</h2>
            <p><?php echo $top['nome']; ?> - <?php echo $top['total']; ?> gols</p>
        </div>
    <?php } ?>

    <div class="card">
        <a href="jogadores/listar_jogadores.php">Jogadores</a> |
        <a href="jogos/listar_jogos.php">Jogos</a> |
        <a href="gols/ranking.php">Ranking</a>
    </div>

</div>
</div>
</body>
</html>