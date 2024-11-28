<?php
session_start();
require_once 'conexao.php'; // Conexão com o banco

// Consultar usuários e treinos
$query = "SELECT u.id, u.nome, t.id AS treino_id, t.objetivo FROM usuarios u 
          JOIN treino t ON u.id = t.usuario_id";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel da Academia</title>
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="static/css/painel.css">
</head>
<body>
    <?php include_once "header.php"; ?>
    <main>
        <h2>Painel da Academia</h2>
        <table>
            <thead>
                <tr>
                    <th>Nome do Aluno</th>
                    <th>Objetivo do Treino</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['nome']) ?></td>
                        <td><?= htmlspecialchars($row['objetivo']) ?></td>
                        <td>
                            <a href="verificadormovimento.php?treino_id=<?= $row['treino_id'] ?>">Verificar Movimento</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <h2>Adicionar Exercício</h2>
        <foorm action="adicionar_exercicio.php" method="POST" enctype="multipart/form-data">
            <label for="nome_exercicio">Nome do Exercício:</label>
            <input type="text" name="nome_exercicio" id="nome_exercicio" placeholder="Digite o nome do exercicio que deseja add" required>


            <label fr="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao"></textarea>

            <label for="arquivo_midia">Arquivo de Mídia (imagem ou vídeo):</label>
            <input type="file" name="arquivo_midia" id="arquivo_midia" accept="image/*,video/*" required>

           
                <?php
                $treinos = $conn->query("SELECT id, objetivo FROM treino");
                while ($treino = $treinos->fetch_assoc()):
                ?>
                    <option value="<?= $treino['id'] ?>"><?= htmlspecialchars($treino['objetivo']) ?></option>
                <?php endwhile; ?>
            </select>

            <button type="submit">Adicionar</button>
        </form>
    </main>
    <?php include_once "footer.php"; ?>
</body>
</html>
