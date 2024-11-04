<?php
// Configurações do banco de dados
$servername = "seu_servidor";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta SQL para buscar os dados dos aparelhos
$sql = "SELECT nome, imagem, ativo FROM aparelhos"; // Substitua com sua consulta SQL

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $nomeAparelho = $row['nome'];
        $imagemAparelho = $row['imagem'];
        $ativo = $row['ativo'];

        // Verificar se o aparelho está ativo (valor 1) ou inativo (valor 0)
        if ($ativo == 1) {
            // Exibir o aparelho se estiver ativo
            echo '<div class="user">';
            echo '<img src="' . $imagemAparelho . '">';
            echo '<h2>' . $nomeAparelho . '</h2>';
            echo '<p>2 minutes ago</p>';
            echo '</div>';
        }
    }
} else {
    // Lida com a situação em que não há dados de aparelhos no banco de dados
    echo "Nenhum dado de aparelho encontrado no banco de dados.";
}

$conn->close();
?>
