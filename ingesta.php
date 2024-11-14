<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingesta</title>
    <link rel="stylesheet" href="css/ingesta.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include_once "header.php"?>
    
    <!-- Botão "Gerador de Dieta" separado na parte superior -->
    <section class="diet-button">
        <a href="geradordieta.php" class="diet-link">
            <div class="icon"><ion-icon name="restaurant-outline"></ion-icon></div>
            <span>Gerador de Dieta</span>
            <div class="icon"><ion-icon name="restaurant-outline"></ion-icon></div>
        </a>
    </section>
    
    <main>
        <section class="diet-generator">
            <div class="diet-info">
                <div class="pyramid">
                    <img src="img/Ingesta.png" alt="Pirâmide Alimentar">
                </div>
                <div class="description">
                    <h3>Pirâmide Alimentar, o que é:</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eu vehicula risus. Fusce vehicula malesuada odio eget euismod.</p>
                </div>
            </div>
            <div class="health-importance">
                <h3>Importância da saúde alimentar:</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eu vehicula risus. Fusce vehicula malesuada odio eget euismod.</p>
            </div>
        </section>
    </main>
    <?php include_once "footer.php"?>
</body>
</html>
