<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de IMC</title>
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="static/css/imc.css">
</head>
<body>
    <?php include_once "headerfisico.php"; ?>
    
    <main>
        <div class="input-section">
            <h1>IMC</h1>
            <h3>Informe seu peso em kg:</h3>
            <input type="text" id="peso" class="input-peso" placeholder="Ex: 70">
            
            <h3>Informe a sua altura em metros:</h3>
            <input type="text" id="altura" class="input-altura" placeholder="Ex: 1.75">
            
            <h3>Seu resultado:</h3>
            <div class="resultado" id="resultado"><RESULTADO></div>
            <button id="salvar-imc" class="btn-salvar">Salvar IMC</button>
        </div>
        
        <div class="right-section">
            <div class="info-box">
                <h4>O que é IMC:</h4>
                <p>Criado no século XIX pelo matemático Lambert Quételet, o Índice de Massa Corporal (IMC) é um cálculo simples que permite medir se alguém está ou não com o peso ideal. O índice é calculado da seguinte maneira: divide-se o peso do paciente pela sua altura elevada ao quadrado</p>
            </div>
        </div>
        <h1>Clique Aqui Para Ir Para A Próxima Página</h1>
        <a href="geradortreino.php"><button>--></button></a>
    </main>

    

    <?php include_once "footer.php"; ?>

    <script>
        function calcularIMC() {
            const peso = parseFloat(document.getElementById("peso").value);
            const altura = parseFloat(document.getElementById("altura").value);
            const resultado = document.getElementById("resultado");
            
            if (!isNaN(peso) && !isNaN(altura) && altura > 0) {
                const imc = peso / (altura * altura);
                resultado.innerHTML = imc.toFixed(2);
                return imc;
            } else {
                resultado.innerHTML = "<RESULTADO>";
                return null;
            }
        }

        document.getElementById("peso").addEventListener("input", calcularIMC);
        document.getElementById("altura").addEventListener("input", calcularIMC);

        document.getElementById("salvar-imc").addEventListener("click", function() {
            const imc = calcularIMC();
            if (imc !== null) {
                const formData = new FormData();
                formData.append("peso", document.getElementById("peso").value);
                formData.append("altura", document.getElementById("altura").value);
                formData.append("resultado_imc", imc);

                fetch("processar_imc.php", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.text())
                .then(data => alert("IMC salvo com sucesso!"))
                .catch(error => console.error("Erro ao salvar IMC:", error));
            } else {
                alert("Por favor, insira valores válidos para peso e altura.");
            }
        });
    </script>
</body>
</html>
