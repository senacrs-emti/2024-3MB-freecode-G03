<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de IMC</title>
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="static/css/geradordieta.css">
</head>
<body>
    <?php include_once "header.php" ?>

    <main>
    <section class="gerador-dieta">
        <h2>Gerador de Dieta</h2>

        <form method="POST" action="processar_dieta.php">
            <p>Escolha o seu gênero:</p>
            <div class="opcoes-genero">
                <label>
                    <input type="radio" name="genero" value="masculino" required>
                    <span class="botao masculino">Masculino</span>
                </label>
                <label>
                    <input type="radio" name="genero" value="feminino" required>
                    <span class="botao feminino">Feminino</span>
                </label>
            </div>
            <p>Escolha a sua faixa de idade:</p>
            <div class="opcoes-idade">
                <label>
                    <input type="radio" name="idade" value="18-50" required>
                    <span class="botao jovem-adulto">De 18 a 50 anos</span>
                </label>
                <label>
                    <input type="radio" name="idade" value="50+" required>
                    <span class="botao adulto-idoso">+ de 50 anos</span>
                </label>
            </div>
            <p>Escolha o seu objetivo:</p>
            <div class="opcoes-objetivo">
                <label>
                    <input type="radio" name="objetivo" value="perder_peso" required>
                    <span class="botao objetivo-perder">Perder Peso</span>
                </label>
                <label>
                    <input type="radio" name="objetivo" value="ganhar_peso" required>
                    <span class="botao objetivo-ganhar">Ganhar Peso</span>
                </label>
                <label>
                    <input type="radio" name="objetivo" value="ganhar_musculo" required>
                    <span class="botao objetivo-ganharmusculo">Ganhar Músculo</span>
                </label>
                <label>
                    <input type="radio" name="objetivo" value="manter_saude" required>
                    <span class="botao objetivo-manter">Manter-se Saudável</span>
                </label>
            </div>
            <p>Informe, se houver, problema de saúde:</p>
            <input type="text" name="problema_saude" class="input-saude" placeholder="Descreva seu problema de saúde">

            <button type="submit" class="botao">Gerar Dieta</button>
        </form>

        <div class="area-dieta">
    <h3>Dieta</h3>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['gerar_dieta'])) {
        // Conexão com o banco de dados
        $pdo = new PDO("mysql:host=localhost;dbname=academia", "root", "");

        // Captura os dados do formulário
        $objetivo = $_POST['objetivo'];
        $problema_saude = $_POST['problema_saude'];
        $genero = $_POST['genero'];

        // Exemplo de geração de dieta
        try {
            $stmt = $pdo->prepare("SELECT * FROM dieta WHERE objetivo = :objetivo AND genero = :genero");
            $stmt->bindParam(':objetivo', $objetivo);
            $stmt->bindParam(':genero', $genero);
            $stmt->execute();
            $dieta = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($dieta) {
                echo "<p>Objetivo: " . htmlspecialchars($dieta['objetivo']) . "</p>";
                echo "<p>Gênero: " . htmlspecialchars($dieta['genero']) . "</p>";
                echo "<p>Problema de Saúde: " . htmlspecialchars($dieta['problema_saude']) . "</p>";
            } else {
                echo "<p>Nenhuma dieta encontrada para as opções selecionadas.</p>";
            }
        } catch (PDOException $e) {
            echo "<p>Erro ao buscar dieta: " . $e->getMessage() . "</p>";
        }
    } else {
        echo "<p>Aqui será exibida a dieta gerada com base nas suas escolhas.</p>";
    }
    ?>
</div>

    </section>
</main>



    <?php include_once "footer.php" ?>
    
</body>
</html>
