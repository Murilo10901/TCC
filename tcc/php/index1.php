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

// Consulta SQL para buscar o texto do banco de dados
$sql = "SELECT texto_do_banco FROM tabela_texto WHERE id = 1"; // Substitua com sua consulta SQL

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $textoDoBanco = $row['texto_do_banco'];

    // Agora, você pode atribuir o texto do banco ao elemento <h2>
    echo '<script>';
    echo 'document.querySelector("h2").textContent = "' . $textoDoBanco . '";';
    echo '</script>';
} else {
    // Lida com a situação em que o texto não foi encontrado no banco de dados
    echo "Texto não encontrado no banco de dados.";
}

$conn->close();
?>
