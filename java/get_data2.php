<?php

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
            return 1; 
    }
}

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "magnitech";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$selectedDay = $_GET['selectedDay'];
$selectedTime = date('H:i:s', strtotime($_GET['selectedTime'])); 

$selectedDayNumeric = getDayOfWeek($selectedDay);

$selectedDayNumeric = getDayOfWeek($selectedDay);

$query = "SELECT Nome_Maquina, COUNT(*) AS quantidade_utilizada FROM movimentacao WHERE DAYOFWEEK(Dia) = ? AND TIME_FORMAT(Horario, '%H') = ? GROUP BY Nome_Maquina";

$stmt = $conn->prepare($query);

$selectedHour = date('H', strtotime($_GET['selectedTime'])); 
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

$conn->close();

header('Content-Type: application/json');
echo json_encode($data);


