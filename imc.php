<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de IMC</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/imc.css">
</head>
<body>
    <?php include_once "header.php" ?>
    
    <main>
        <!-- Seção de entrada à esquerda -->
        <div class="input-section">
            <h1>IMC</h1>
            <h3>Informe seu peso em kg:</h3>
            <input type="text" placeholder="Ex: 70" id="peso">
            
            <h3>Informe a sua altura em metros:</h3>
            <input type="text" placeholder="Ex: 1.75" id="altura">
            
            <h3>Seu resultado:</h3>
            <div class="resultado" id="resultado"><RESULTADO></div>
        </div>
        
        <!-- Seção de informações à direita -->
        <div class="right-section">
            <div class="info-box">
                <h4>O que é IMC:</h4>
                <p>O Índice de Massa Corporal (IMC) é uma medida utilizada para avaliar se uma pessoa está dentro do peso ideal em relação à sua altura, indicando condições como baixo peso, normal, sobrepeso e obesidade.</p>
            </div>
            
            <div class="imc-tabela">
                <h4>VALORES DO IMC: PESSOAS DE 20 A 60 ANOS</h4>
                <table>
                    <tr>
                        <th>VALOR DO IMC</th>
                        <th>CLASSIFICAÇÃO</th>
                    </tr>
                    <tr class="baixo-peso">
                        <td>Menor que 18,5</td>
                        <td>Baixo peso</td>
                    </tr>
                    <tr class="normal">
                        <td>De 18,5 a 24,99</td>
                        <td>Normal</td>
                    </tr>
                    <tr class="sobrepeso">
                        <td>De 25 a 29,99</td>
                        <td>Sobrepeso</td>
                    </tr>
                    <tr class="obesidade">
                        <td>Maior que 30</td>
                        <td>Obesidade</td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
    
    <?php include_once "footer.php" ?>
    
    <script>
        // Função para calcular IMC
        document.getElementById("peso").addEventListener("input", calcularIMC);
        document.getElementById("altura").addEventListener("input", calcularIMC);
        
        function calcularIMC() {
            const peso = parseFloat(document.getElementById("peso").value);
            const altura = parseFloat(document.getElementById("altura").value);
            const resultado = document.getElementById("resultado");
            
            if (!isNaN(peso) && !isNaN(altura) && altura > 0) {
                const imc = peso / (altura * altura);
                resultado.innerHTML = imc.toFixed(2);
            } else {
                resultado.innerHTML = "<RESULTADO>";
            }
        }
    </script>
</body>
</html>
