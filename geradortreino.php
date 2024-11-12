<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de IMC</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/geradortreino.css">
</head>
<body>
    <?php include_once "header.php" ?>
    
    <main>
    <section class="gerador-treino">
        <h2>Gerador de Treino</h2>
        
        <p>Escolha o seu objetivo:</p>
        <div class="opcoes-objetivo">
            <label>
                <input type="checkbox" name="objetivo" class="objetivo-checkbox" id="ganhar-musculo">
                <span class="botao objetivo-ganhar">Ganhar Músculo</span>
            </label>
            <label>
                <input type="checkbox" name="objetivo" class="objetivo-checkbox" id="fortalecer-musculo">
                <span class="botao objetivo-fortalecer">Fortalecer Músculo</span>
            </label>
        </div>
        
        <p>Informe, se houver, problema de saúde:</p>
        <input type="text" class="input-saude" placeholder="Descreva seu problema de saúde">
        
        <div class="area-treino">
            <h3>Treino</h3>
            <p>Aqui será exibido o treino gerado com base nas suas escolhas.</p>
        </div>
    </section>
</main>


    <?php include_once "footer.php" ?>
    
</body>
</html>
