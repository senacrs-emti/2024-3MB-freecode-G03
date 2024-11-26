<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificador de movimento</title>
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="static/css/verificadormovimento.css">
</head>
<body>
    <?php include_once "header.php";?>

    <?php
require_once 'conexao.php';

$treino_id = $_GET['treino_id'];
$query = "SELECT nome_exercicio, descricao, arquivo_midia FROM exercicios WHERE treino_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $treino_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<main>
    <h1>Exercícios do Treino</h1>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li>
                <h2><?= htmlspecialchars($row['nome_exercicio']) ?></h2>
                <p><?= htmlspecialchars($row['descricao']) ?></p>
                <?php if (preg_match('/\.(mp4|webm)$/', $row['arquivo_midia'])): ?>
                    <video controls>
                        <source src="<?= htmlspecialchars($row['arquivo_midia']) ?>" type="video/mp4">
                        Seu navegador não suporta vídeos.
                    </video>
                <?php else: ?>
                    <img src="<?= htmlspecialchars($row['arquivo_midia']) ?>" alt="<?= htmlspecialchars($row['nome_exercicio']) ?>">
                <?php endif; ?>
            </li>
        <?php endwhile; ?>
    </ul>
</main>

    <?php include_once "footer.php"; ?>
</body>
</html>