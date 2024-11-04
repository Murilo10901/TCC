<?php
// Função para mapear os dias da semana para valores numéricos
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
$selectedTime = date('H:i:s', strtotime($_GET['selectedTime'])); // Recebendo o parâmetro do horário selecionado e formatando-o

// Use a função para obter o valor numérico do dia da semana
$selectedDayNumeric = getDayOfWeek($selectedDay);

// Prepare a consulta SQL para obter os dados correspondentes ao dia e horário selecionados
$selectedDayNumeric = getDayOfWeek($selectedDay);


// Prepare a consulta SQL para obter os dados correspondentes ao dia e horário selecionados
$query = "SELECT Nome_Maquina, COUNT(*) AS quantidade_utilizada FROM movimentacao WHERE DAYOFWEEK(Dia) = ? AND TIME_FORMAT(Horario, '%H') = ? GROUP BY Nome_Maquina";

$stmt = $conn->prepare($query);

$selectedHour = date('H', strtotime($_GET['selectedTime'])); // Extrair a hora selecionada
$stmt->bind_param("is", $selectedDayNumeric, $selectedHour);

$stmt->execute();

$result = $stmt->get_result();
$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = array(
            "Nome_Maquina" => $row['Nome_Maquina'],
            "quantidade_utilizada" => $row['quantidade_utilizada']
        );
    }
}

// Feche a conexão com o banco de dados
$conn->close();

// Retorne os dados como JSON
header('Content-Type: application/json');
echo json_encode($data);


