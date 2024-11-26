<?php
$servername = "localhost"; // Nome do servidor (geralmente localhost)
$username = "root"; // Usuário do banco (default para XAMPP é root)
$password = ""; // Senha do banco (default para XAMPP é vazio)
$dbname = "academia"; // Nome do banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}
?>
