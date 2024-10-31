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


<main>
    <section class="container">
        <!-- Card Físico -->
         <a href="fisico.php">
        <div class="card card-fisico">
            <h2>FÍSICO</h2>
            <img src="img/Fisico.png" alt="Ícone Físico">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eu vehicula risus. Fusce vehicula malesuada odio eget euismod.</p>
        </div>
        </a>
        <!-- Card Mental -->
         <a href="#">
        <div class="card card-mental">
            <h2>MENTAL</h2>
            <img src="img/Mental.png" alt="Ícone Mental">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eu vehicula risus. Fusce vehicula malesuada odio eget euismod.</p>
        </div>
        </a>
        <!-- Card Ingesta -->
         <a href="#">
        <div class="card card-ingesta">
            <h2>INGESTA</h2>
            <img src="img/Ingesta.png" alt="Ícone Ingesta">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eu vehicula risus. Fusce vehicula malesuada odio eget euismod.</p>
        </div>
        </a>
    </section>
</main>

<?php
include_once "footer.php"
?>




    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>