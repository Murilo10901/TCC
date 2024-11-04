<?php
session_start();

$servidor = "127.0.0.1";
$usuario = "root";
$senha = "";
$banco = "magnitech";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);
if ($conexao->connect_error) {
    echo "Erro ao conectar: (" . $conexao->connect_errno . ") " . $conexao->connect_error;
}
$query = "SELECT Nome_Maquina, IMG, estado FROM em_uso";

$resultado = $conexao->query($query);
$numAparelhosEmUso = 0;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/logo.ico" sizes="290x290">
    <title>MagniTech</title>
</head>

<body>

    <div class="container">

        <aside>
            
           
        
            <div>
               
            </div>

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
           
            <div class="analyse">
                <div class="sales">
                    <div class="status">
                        <div class="info">
                          <H1>APARELHOS SENDO UTILIZADOS</H1>
                          <h2 id="textoDoBanco"></h2>
                          <?php
                    if ($numAparelhosEmUso > 0) {
                        echo $numAparelhosEmUso;
                    }
                    ?>
                        </div>
                    </div>
                </div>
            <div class="new-users">
    <h1>APARELHOS EM USO</h1>
    <div class="new-users">
    <?php
      while ($linha = $resultado->fetch_assoc()) {
       if ($linha['Nome_Maquina'] && isset($linha['estado']) && $linha['estado'] == 'ativo') {
        $nomeArquivo = $linha['IMG'];
        $caminhoImagens = '/dashboard/tcc/tcc/img/img_maquinas/';
        $imagemURL = $caminhoImagens . $nomeArquivo;
        echo "<div class='user'>
            <img src='" . $imagemURL . "' alt='" . $linha['Nome_Maquina'] . "'>
            <h2>" . $linha['Nome_Maquina'] . "</h2>
        </div>";
        $numAparelhosEmUso++;
        } else {
          }
         }
       ?>
<script>
    document.getElementById('textoDoBanco').textContent = "Total de aparelhos em uso: <?php echo $numAparelhosEmUso; ?>";
</script>
</div>
</div>
</div>
        </main>
        <div class="right-section">
    <div class="nav">
        <div class="profile-section">
            <button id="menu-btn">
                <span class="material-icons-sharp">
                    menu
                </span>
            </button>
        </div>
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
            <p>Olá, <b><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Usuário' ?></b></p>
            </div>
        </div>
        <script>
            const urlParams = new URLSearchParams(window.location.search);
            const username = urlParams.get('username');
            if (username) {
                document.getElementById('usernamePlaceholder').textContent = username;
            }
        </script>
    </div>
   <script>
    document.addEventListener('DOMContentLoaded', function () {
        const mainElement = document.querySelector('main');
        mainElement.classList.add('fade-in');
    });
</script>
<script src="https://cdn.rawgit.com/cozmo/jsQR/master/dist/jsQR.js"></script>
    <script src="java/order.js"></script>
    <script src="java/index.js"></script>
</body>
</html>