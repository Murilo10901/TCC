<?php
session_start();

$host = "127.0.0.1";
$user = "root";
$pass = "";
$db = "magnitech";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro de conexão com o banco de dados: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cpf = $_POST["CPF"];
    $senha = $_POST["SENHA"];

    $sql = "SELECT CPF, Senha, Nome FROM moradores WHERE CPF = '$cpf'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if ($senha == $row["Senha"]) {
 
            $_SESSION["usuario_logado"] = true;
            $_SESSION["CPF"] = $cpf; 

    
            $_SESSION["username"] = $row["Nome"]; 

            header("Location: index.php"); 
        } else {
           
            $_SESSION["erro_login"] = "Senha inválida";
            header("Location: login.php"); 
        }
    } else {
      
        $_SESSION["erro_login"] = "CPF não encontrado";
        header("Location: login.php"); 
    }
}

$conn->close();
?>
