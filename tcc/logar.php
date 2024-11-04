<?php
session_start();

// Conexão com o banco de dados MySQL
$host = "127.0.0.1";
$user = "root";
$pass = "";
$db = "magnitech";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro de conexão com o banco de dados: " . $conn->connect_error);
}

// Verifique se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere o CPF e senha fornecidos no formulário (validação pode ser adicionada aqui)
    $cpf = $_POST["CPF"];
    $senha = $_POST["SENHA"];

    // Consulta SQL para verificar CPF e senha
    $sql = "SELECT CPF, Senha, Nome FROM moradores WHERE CPF = '$cpf'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verifique a senha
        if ($senha == $row["Senha"]) {
            // A senha está correta, o usuário está autenticado
            $_SESSION["usuario_logado"] = true;
            $_SESSION["CPF"] = $cpf; // Definindo o CPF na sessão

            // Obtendo o nome do usuário a partir do banco de dados
            $_SESSION["username"] = $row["Nome"]; // Definindo o nome do usuário na sessão

            header("Location: index.php"); // Redireciona para a página de perfil
        } else {
            // A senha é inválida, exiba uma mensagem de erro
            $_SESSION["erro_login"] = "Senha inválida";
            header("Location: login.php"); // Redireciona de volta para a página de login
        }
    } else {
        // O CPF não foi encontrado, exiba uma mensagem de erro
        $_SESSION["erro_login"] = "CPF não encontrado";
        header("Location: login.php"); // Redireciona de volta para a página de login
    }
}

// Feche a conexão com o banco de dados
$conn->close();
?>
