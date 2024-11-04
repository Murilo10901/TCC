<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "magnitech";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
 
    date_default_timezone_set('America/Sao_Paulo');
    $id = $conn->real_escape_string($_GET['id']);

    $sql = "SELECT estado, Nome_Maquina FROM em_uso WHERE ID_Maquina = '$id'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentStatus = $row['estado'];
        $machineName = $row['Nome_Maquina'];

        $newStatus = ($currentStatus == 'ativo') ? 'inativo' : 'ativo';

        $update_sql = "UPDATE em_uso SET estado = '$newStatus' WHERE ID_Maquina = '$id'";

        if ($conn->query($update_sql) === TRUE) {
            echo "Estado da máquina alterado para $newStatus";

            $insert_movimentacao = "INSERT INTO movimentacao (ID_MAQUINA, Horario, Dia, Nome_Maquina) VALUES ('$id', '" . date('H:i') . "', '" . date('Y-m-d') . "', '$machineName')";

            if ($conn->query($insert_movimentacao) !== TRUE) {
                echo "Erro ao adicionar registro de utilização para a máquina ID $id: " . $conn->error;
            }

            header("Location: index.php");
            exit();
        } else {
            echo "Erro ao alterar o estado da máquina: " . $conn->error;
        }
    } else {
        echo "Máquina com ID $id não encontrada no banco de dados.";
    }
} else {
    echo "ID da máquina não fornecido.";
}

$conn->close();
?>