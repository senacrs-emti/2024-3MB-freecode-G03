<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de IMC</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mental.css">
</head>
<body>
    <?php include_once "header.php" ?>
    
    <main>
   
    <section class="categorias-mentais">
        <div class="categoria" style="background-color: #FFD700;" onclick="toggleContent(this)">
            <p>Ansiedade</p>
            <div class="conteudo-expandido">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab esse eius quis commodi, repellat repudiandae sed delectus architecto culpa voluptas aliquid voluptatem molestias vero nihil reiciendis sequi! Nam, ad libero!</p>
            </div>
        </div>
        <div class="categoria" style="background-color: #FFA500;" onclick="toggleContent(this)">
            <p>Depressão</p>
            <div class="conteudo-expandido">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab esse eius quis commodi, repellat repudiandae sed delectus architecto culpa voluptas aliquid voluptatem molestias vero nihil reiciendis sequi! Nam, ad libero!</p>
            </div>
        </div>
        <div class="categoria" style="background-color: #FF8C00;" onclick="toggleContent(this)">
            <p>Estresse</p>
            <div class="conteudo-expandido">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab esse eius quis commodi, repellat repudiandae sed delectus architecto culpa voluptas aliquid voluptatem molestias vero nihil reiciendis sequi! Nam, ad libero!</p>
            </div>
        </div>
        <div class="categoria" style="background-color: #FF4500;" onclick="toggleContent(this)">
            <p>Autocuidado</p>
            <div class="conteudo-expandido">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab esse eius quis commodi, repellat repudiandae sed delectus architecto culpa voluptas aliquid voluptatem molestias vero nihil reiciendis sequi! Nam, ad libero!</p>
            </div>
        </div>
        <div class="categoria" style="background-color: #FF0000;" onclick="toggleContent(this)">
            <p>Bem-estar emocional</p>
            <div class="conteudo-expandido">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab esse eius quis commodi, repellat repudiandae sed delectus architecto culpa voluptas aliquid voluptatem molestias vero nihil reiciendis sequi! Nam, ad libero!</p>
            </div>
        </div>
    </section>
    
    <section class="descricao-mental">
        <h2>Importância da saúde mental:</h2>
        <p>
            A saúde mental é essencial para o bem-estar geral e qualidade de vida. Cuidar da mente é tão importante quanto cuidar do corpo, pois a mente saudável permite enfrentar os desafios do dia a dia com resiliência.
        </p>
    </section>
</main>

<script>

function toggleContent(card) {
    // Fecha todos os outros cards abertos
    document.querySelectorAll('.categoria.expanded').forEach(function(openCard) {
        if (openCard !== card) openCard.classList.remove('expanded');
    });
    
    // Alterna a expansão do card clicado
    card.classList.toggle('expanded');
}

</script>


    <?php include_once "footer.php" ?>
    
</body>
</html>
