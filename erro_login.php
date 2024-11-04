<?php
session_start();

$_SESSION["erro-login"] = "CPF ou senha inválidos. Por favor, verifique suas credenciais e tente novamente.";

header("Location: login.php");
?>
