
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="perfil.css">
    <link rel="icon" href="img/logo.ico" sizes="290x290">
    <title>MagniTech</title>
</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="sidebar">
            <div>
                <img src="img/footer_2.png" alt="">
                <div class="toggle">
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                  </div>
                   </div>
                <a href="index.php">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Inicio</h3>
                </a>
                <a href="Gráficos.php">
                    <span class="material-icons-sharp">
                    bar_chart
                    </span>
                    <h3>GRÁFICOS</h3>
                </a>
               
                <a href="perfil.php">
                    <span class="material-icons-sharp">
                    person_outline
                    </span>
                    <h3>PERFIL</h3>
                    
                </a>
            
                <a href="https://jovial-lollipop-81d6fd.netlify.app/">
                    <span class="material-icons-sharp">
                        report_gmailerrorred
                    </span>
                    <h3>SOBRE NÓS</h3>
                </a>
              
                <a href="login.php">
                    <span class="material-icons-sharp">
                    arrow_back
                    </span>
                    <h3>Sair</h3>
                </a>
                
            </div>
        </aside>

        <main>

           <div class="new-users">
            <div class="profile-container">
                
                <div class="user-info">
                <?php
session_start();
if (!isset($_SESSION['usuario_logado'])) {  
    header("Location: login.php");
    exit;
}
$cpf = $_SESSION['CPF'];
$servidor = "127.0.0.1";
$usuario = "root";
$senha = "";
$banco = "magnitech";
$conexao = new mysqli($servidor, $usuario, $senha, $banco);
if ($conexao->connect_errno) {
    echo "Erro ao conectar : (" . $conexao->connect_errno . ") " . $conexao->connect_error;
}
$query = "SELECT Condominios, Nome, AP, Bloco, Fone FROM moradores WHERE CPF = '$cpf'";
$resultado = $conexao->query($query);
$linha = $resultado->fetch_assoc();

if ($linha) {
    echo "<div class='profile-container'>";
    echo "<h1>Nome do Usuário: " . $linha["Nome"] . "</h1>";
    echo "<p>condominío: " . $linha["Condominios"] . "</p>";
    echo "<p>Apartamento: " . $linha["AP"] . "</p>";
    echo "<p>Bloco: " . $linha["Bloco"] . "</p>";
    echo "<p>Fone: " . $linha["Fone"] . "</p>";
    echo "</div>";
} else {
    echo "Nenhum usuário encontrado.";
}
?>
           </div></div>    
        </main>
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                    dark_mode
                    </span>
                </div>

                <div class="profile">
                    <div class="info">
                    <?php
                        if (isset($_SESSION['username'])) {
                            echo "<p>Olá, <b>" . $_SESSION['username'] . "</b></p>";
                        } else {
                            echo "<p>Usuário não encontrado</p>";
                        }
                        ?>
                    </div>   
                </div>
            </div>
  
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const mainElement = document.querySelector('main');
        mainElement.classList.add('fade-in');
    });
   </script>
    <script src="java/order.js"></script>
    <script src="java/index.js"></script>
</body>

</html>