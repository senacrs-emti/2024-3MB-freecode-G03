<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2 class="title">Cadastre-se</h2>
        
        <!-- Formulário de cadastro -->
        <form action="" method="post">
            
            <!-- Campo Nome Completo -->
            <label for="name">Nome Completo:</label>
            <input type="text" id="name" name="name" required>
            
            <!-- Campo Gênero -->
            <label>Gênero:</label>
            <div class="gender-options">
                <input type="radio" id="feminino" name="gender" value="Feminino" required>
                <label for="feminino" class="gender-button">Feminino</label>
                
                <input type="radio" id="masculino" name="gender" value="Masculino">
                <label for="masculino" class="gender-button">Masculino</label>
            </div>
            
            <!-- Campo Data de Nascimento -->
            <label for="birthdate">Data de Nascimento:</label>
            <input type="date" id="birthdate" name="birthdate" required>
            
            <!-- Campo E-mail -->
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email"  required>
            
            <!-- Campo Telefone -->
            <label for="phone">Telefone:</label>
            <input type="tel" id="phone" name="phone" pattern="\(\d{2}\)\s\d{4,5}-\d{4}" required>
            
            <!-- Campo Senha -->
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password"  required>
            
            <!-- Botão de envio -->
            <button type="submit" class="submit-button">Cadastrar</button>
        </form>
        
        <!-- Link para login -->
        <p class="login-link">Já tem uma conta? <a href="login.php">Entre</a>.</p>
    </div>
</body>
</html>
