<?php
session_start();
require 'db.php';

// Dados das dietas
$dietas = [
    "18-50" => [
        "perder_peso" => [
            "consumir" => ["Frango", "Tilápia", "Ovos", "Batata-doce", "Quinoa", "Arroz integral", "Abacate", "Azeite", "Brócolis", "Abobrinha"],
            "evitar" => ["Frituras", "Doces", "Refrigerantes", "Alimentos ultraprocessados"]
        ],
        "ganhar_peso" => [
            "consumir" => ["Ovos inteiros", "Leite integral", "Iogurte grego", "Pão integral", "Macarrão", "Azeite", "Amendoim", "Carne vermelha"],
            "evitar" => ["Álcool", "Açúcar em excesso"]
        ],
        "ganhar_musculo": [
            "consumir": ["Frango", "Carne magra", "Whey protein", "Arroz branco", "Tapioca", 
                         "Batata inglesa", "Óleo de linhaça", "Sementes de chia"],
            "evitar": ["Álcool", "Fast food", "Doces em excesso", "Frituras"]
        ],
        "manter_saude": [
            "consumir": ["Peixe (salmão)", "Ovos", "Lentilha", "Arroz integral", "Inhame", 
                         "Cuscuz", "Azeite", "Linhaça"],
            "evitar": ["Refrigerantes", "Embutidos", "Excesso de sal", "Produtos com açúcar adicionado"]
        ]
    ],
    "50+": [
        "perder_peso": [
            "consumir": ["Peixe grelhado", "Tofu", "Arroz integral", "Batata-doce", 
                         "Abacate", "Azeite", "Espinafre", "Couve"],
            "evitar": ["Ultraprocessados", "Doces", "Frituras", "Refrigerantes"]
        ],
        "ganhar_peso": [
            "consumir": ["Iogurte", "Queijo", "Ovos inteiros", "Arroz branco", "Frutas secas", 
                         "Castanhas", "Azeite"],
            "evitar": ["Bebidas alcoólicas", "Açúcar em excesso", "Alimentos com baixo valor nutricional"]
    ],
        "ganhar_musculo": [
            "consumir": ["Frango", "Atum", "Carne vermelha magra", "Quinoa", "Batata-doce", 
                         "Nozes", "Azeite"],
            "evitar": ["Frituras", "Doces", "Produtos industrializados com aditivos químicos"]
],
        "manter_saude": [
            "consumir": ["Sardinha", "Lentilha", "Ovos", "Arroz integral", "Cenoura", 
                         "Azeite", "Sementes"],
            "evitar": ["Excesso de sódio", "Refrigerantes", "Ultraprocessados"]
        ]
    ]
]
   

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_id = $_SESSION['user_id'];
    $objetivo = $_POST['objetivo'];
    $problema_saude = $_POST['problema_saude'];

    // Obtém a idade do usuário
    $stmt = $pdo->prepare("SELECT data_nascimento FROM usuarios WHERE id = ?");
    $stmt->execute([$usuario_id]);
    $user = $stmt->fetch();

    if ($user) {
        $data_nascimento = new DateTime($user['data_nascimento']);
        $idade = $data_nascimento->diff(new DateTime())->y;

        // Determina a faixa etária
        $faixa_etaria = $idade <= 50 ? "18-50" : "50+";

        if (isset($dietas[$faixa_etaria][$objetivo])) {
            $dieta = $dietas[$faixa_etaria][$objetivo];

            echo "<h3>Alimentos recomendados:</h3><ul>";
            foreach ($dieta['consumir'] as $alimento) {
                echo "<li>$alimento</li>";
            }
            echo "</ul>";

            echo "<h3>Alimentos a evitar:</h3><ul>";
            foreach ($dieta['evitar'] as $alimento) {
                echo "<li>$alimento</li>";
            }
            echo "</ul>";

            // Salva no banco de dados
            $stmt = $pdo->prepare("INSERT INTO dieta (usuario_id, objetivo, problema_saude) VALUES (?, ?, ?)");
            if ($stmt->execute([$usuario_id, $objetivo, $problema_saude])) {
                echo "Dieta registrada com sucesso!";
            } else {
                echo "Erro ao registrar dieta.";
            }
        } else {
            echo "Nenhuma dieta disponível para a combinação de idade e objetivo.";
        }
    } else {
        echo "Usuário não encontrado.";
    }
}
?>
