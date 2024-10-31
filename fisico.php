<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Bem Estar</title>
</head>

<body>
  <?php
  include_once "header.php";
  ?>


<main class="home_fisico_main">
   <h1>
    Selecione uma opção:
   </h1>
   <nav>
    <ul>
        <a href="#">
            <li class="card_fisico">
                <section>
                    <h1>IMC</h1>
                </section>
                <h2>
                    Cálculo IMC
                </h2>
        </li>
    </a>
    <a href="#">
            <li class="card_fisico">
              <section>
                <img src="#" alt="">
              </section>
                <h2>
                    Verificador de <br> Movimento
                </h2>
        </li>
    </a>
    <a href="#">
            <li class="card_fisico">
                <section>
                    <img src="" alt="">
                </section>
                <h2>
                    Gerador de treino
                </h2>
        </li>
    </a>
    <a href="#">
            <li class="card_fisico">
                <section>
                    <img src="#" alt="">
                </section>
                <h2>
                    Avaliador Físico
                </h2>
        </li>
    </a>
    </ul>
   </nav>

   <section>
    <h1>
    Motivos pelo qual o execício físico é importante:
    </h1>
    <nav>
        <ul>
            <li>lorem</li>
            <li>lorem</li>
            <li>lorem</li>
            <li>lorem</li>
            <li>lorem</li>
        </ul>
    </nav>
   </section>
</main>

<?php
include_once "footer.php"
?>




    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>