<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de IMC</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/geradordieta.css">
</head>
<body>
    <?php include_once "header.php" ?>
    <?php include 'middleware.php'; ?>

    <main>
    <section class="gerador-dieta">
        <h2>Gerador de Dieta</h2>
        
        <p>Escolha o seu objetivo:</p>
        <div class="opcoes-objetivo">
            <label>
                <input type="checkbox" name="objetivo" class="objetivo-checkbox" id="ganhar-peso">
                <span class="botao objetivo-ganhar">Ganhar Peso</span>
            </label>
            <label>
                <input type="checkbox" name="objetivo" class="objetivo-checkbox" id="perder-peso">
                <span class="botao objetivo-perder">Perder Peso</span>
            </label>
        </div>
        
        <p>Informe, se houver, problema de saúde:</p>
        <input type="text" class="input-saude" placeholder="Descreva seu problema de saúde">
        
        <div class="area-dieta">
            <h3>Dieta</h3>
            <p>Aqui será exibido o treino gerado com base nas suas escolhas.</p>
        </div>
    </section>
</main>


    <?php include_once "footer.php" ?>
    
</body>
</html>
