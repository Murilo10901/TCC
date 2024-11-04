<?php
// Substitua as credenciais do banco de dados pelas suas
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "magnitech";

// Crie uma conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifique a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare a consulta SQL para obter os dados correspondentes a cada dia da semana
$query = "SELECT 
            SUM(CASE WHEN DAYOFWEEK(Dia) = 1 THEN 1 ELSE 0 END) AS Domingo,
            SUM(CASE WHEN DAYOFWEEK(Dia) = 2 THEN 1 ELSE 0 END) AS Segunda,
            SUM(CASE WHEN DAYOFWEEK(Dia) = 3 THEN 1 ELSE 0 END) AS Terca,
            SUM(CASE WHEN DAYOFWEEK(Dia) = 4 THEN 1 ELSE 0 END) AS Quarta
          FROM movimentacao
          WHERE DAYOFWEEK(Dia) BETWEEN 1 AND 4";

$result = $conn->query($query);
$data = $result->fetch_assoc();

// Feche a conexão com o banco de dados
$conn->close();

// Retorne os dados como JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
