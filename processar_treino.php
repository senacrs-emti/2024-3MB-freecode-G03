<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_id = $_SESSION['user_id'];
    $objetivo = $_POST['objetivo'];
    $problema_saude = $_POST['problema_saude'];

    // Recuperar informações do usuário e IMC
    $stmt = $pdo->prepare("SELECT u.genero, u.data_nascimento, imc.resultado_imc 
                           FROM usuarios u 
                           LEFT JOIN imc ON u.id = imc.usuario_id 
                           WHERE u.id = ?");
    $stmt->execute([$usuario_id]);
    $userData = $stmt->fetch();

    // Validar se os dados do usuário foram recuperados
    if (!$userData) {
        echo "Erro ao recuperar dados do usuário.";
        exit();
    }

    $genero = $userData['genero'];
    $imc = $userData['resultado_imc'];
    $idade = date_diff(date_create($userData['data_nascimento']), date_create('today'))->y;

    // Lógica para sugerir treino com base nos dados
    $treino = "Treino padrão";
    if ($imc < 18.5) {
        $treino = "Treino para ganho de peso";
    } elseif ($imc >= 18.5 && $imc < 24.9) {
        $treino = $objetivo == "ganhar-musculo" ? "Treino para hipertrofia" : "Treino para manutenção";
    } elseif ($imc >= 25) {
        $treino = "Treino para emagrecimento";
    }

    if ($genero == "feminino") {
        $treino .= " com foco em resistência.";
    } else {
        $treino .= " com foco em força.";
    }

    // Salvar treino no banco de dados
    $stmt = $pdo->prepare("INSERT INTO treino (usuario_id, objetivo, problema_saude, treino) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$usuario_id, $objetivo, $problema_saude, $treino])) {
        echo "Treino gerado com sucesso: $treino";
    } else {
        echo "Erro ao registrar treino.";
    }
}
?>
