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

$selectedDay = $_GET['selectedDay']; // Recebendo o parâmetro do dia selecionado

// Mapear o nome do dia da semana
$dayOfWeek = getDayOfWeek($selectedDay);

// Prepare a consulta SQL para obter os dados correspondentes ao dia da semana selecionado
$query = "SELECT Nome_Maquina, COUNT(*) AS quantidade_utilizada FROM movimentacao WHERE DAYOFWEEK(Dia) = ? GROUP BY Nome_Maquina";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $dayOfWeek);
$stmt->execute();

$result = $stmt->get_result();
$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Feche a conexão com o banco de dados
$conn->close();

// Retorne os dados como JSON
header('Content-Type: application/json');
echo json_encode($data);

// Função para mapear o nome do dia da semana
function getDayOfWeek($selectedDay)
{
    switch ($selectedDay) {
        case "Domingo":
            return 1;
        case "Segunda-feira":
            return 2;
        case "Terça-feira":
            return 3;
        case "Quarta-feira":
            return 4;
        case "Quinta-feira":
            return 5;
        case "Sexta-feira":
            return 6;
        case "Sábado":
            return 7;
        default:
            return 1; // Definir como domingo por padrão
    }
}
?>
