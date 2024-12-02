<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de IMC</title>
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="static/css/geradortreino.css">
</head>
<body>
    <?php include_once "headerfisico.php" ?>

    <main>
    <form method="POST" action="processar_treino.php">
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

            <button type="submit" class="botao">Gerar Treino</button>
        </form>

        <div class="area-treino">
            <h3>Treino</h3>
            <p>Aqui será exibido o treino gerado com base nas suas escolhas.</p>
        </div>
        <form id="form-treino" action="processar_treino.php" method="POST">
    </section>
</main>


    <?php include_once "footer.php" ?>
    
</body>
</html>
