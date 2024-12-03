<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'conexao.php';

$user_id = $_SESSION['user_id']; // ID do usuário na sessão

// Consulta para obter os dados do usuário
$query = "SELECT nome, dieta, treino, imc FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nome = $row['nome'];
    $dieta = $row['dieta'];
    $treino = $row['treino'];
    $imc = $row['imc'];
} else {
    echo "Usuário não encontrado.";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Resultados</title>
</head>
<body>
    <h1>Olá, <?php echo htmlspecialchars($nome); ?>!</h1>
    <h2>Seus Resultados</h2>
    <p><strong>Dieta:</strong> <?php echo htmlspecialchars($dieta); ?></p>
    <p><strong>Treino:</strong> <?php echo htmlspecialchars($treino); ?></p>
    <p><strong>IMC:</strong> <?php echo htmlspecialchars($imc); ?></p>
</body>
</html>
