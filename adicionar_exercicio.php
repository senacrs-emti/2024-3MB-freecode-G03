<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_exercicio = $_POST['nome_exercicio'];
    $descricao = $_POST['descricao'];
    $treino_id = $_POST['treino_id'];

    // Upload do arquivo
    $arquivo_midia = $_FILES['arquivo_midia'];
    $caminho = 'uploads/' . basename($arquivo_midia['name']);
    if (move_uploaded_file($arquivo_midia['tmp_name'], $caminho)) {
        $query = "INSERT INTO exercicios (nome_exercicio, descricao, arquivo_midia, treino_id) 
                  VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssi', $nome_exercicio, $descricao, $caminho, $treino_id);
        $stmt->execute();

        header('Location: painel.php');
    } else {
        echo "Erro no upload do arquivo.";
    }
}
?>
