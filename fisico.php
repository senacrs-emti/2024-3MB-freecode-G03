<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu de Opções</title>
   <link rel="stylesheet" href="static/css/fisico.css">
   <link rel="stylesheet" href="static/css/style.css">
</head>
<body>
    <?php include_once "headerfisico.php"?>
    <div class="container">
        <div class="menu">
            
            <h2>Selecione uma opção:</h2>
            <div class="menu-item imc">
            <a href="imc.php">
            <span class="card-text" style="font-size: 45px;">IMC</span>
            <span class="card-subtext">Cálculo de IMC</span>
            </a>
        </div>
        <div class="menu-item verificador">
            <a href="verificadormovimento.php">
            <span><img style="width: 100px; height: 100px;" src="img/halter.png" alt="Ícone de movimento"></span>
            <span class="card-text">Verificador de movimento</span>
            </a>
        </div>
        <div class="menu-item treino">
            <a href="geradortreino.php">
            <span><img style="width: 100px; height: 100px;" src="img/braco.png" alt="Ícone de treino"></span>
            <span class="card-text">Gerador de Treino</span>
            </a>
        </div>
        <div class="menu-item avaliador">
            <a href="avaliadorfisico.php">
        <span><img style="width: 100px; height: 100px;" src="img/shape.png" alt="Ícone de avaliador"></span>
        <span class="card-text">Avaliador de Físico</span>
        </a>
        </div>

        </div>
        <div class="info-box">
            <h3>Motivos pelo qual o exercício físico é importante:</h3>
            <ul>
                <li>Reduz o estresse e sintomas de ansiedade;</li>
                <li>Melhora a qualidade do sono; </li>
                <li>Melhora a aprendizagem; </li>
                <li>Reduz sintomas depressivos; </li>
                <li>Previne e diminui a mortalidade por doenças crônicas; </li>
                <li>Melhora a força, equilíbrio e flexibilidade; </li>
                <li>Proporciona a socialização e a convivência. .</li>
            </ul>
        </div>
    </div>
    <?php include_once "footer.php"?>
</body>
</html>
