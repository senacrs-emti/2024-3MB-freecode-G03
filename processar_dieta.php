<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_id = $_SESSION['user_id'];
    $objetivo = $_POST['objetivo'];
    $problema_saude = $_POST['problema_saude'];

    $stmt = $pdo->prepare("INSERT INTO dieta (usuario_id, objetivo, problema_saude) VALUES (?, ?, ?)");
    if ($stmt->execute([$usuario_id, $objetivo, $problema_saude])) {
        echo "Dieta registrada com sucesso!";
    } else {
        echo "Erro ao registrar dieta.";
    }
}
?>
