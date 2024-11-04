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

$query = "SELECT  Nome_Maquina, IMG
          FROM em_uso";

$resultado = $conexao->query($query);
$numAparelhosEmUso = 0;
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <script src="https://cdn.rawgit.com/davidshimjs/qrcode/gh-pages/qrcode.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>MagniTech</title>
</head>

<body  class="dark-mode-variables">

    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <h1 class="magnititle"><span class="danger">MagniTech</span></h1>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
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
            
                <a href="indexsite_copy.html">
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
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>
            <!-- Analyses -->
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
                        <div class="progresss">
                            
                            <div class="percentage">
                              
                            </div>
                        </div>
                    </div>
                </div>
                
            <!-- End of Analyses -->

            <!-- New Users Section -->
            <div class="new-users">
    <h1>APARELHOS EM USO</h1>
    <div class="new-users">
    <?php
while ($linha = $resultado->fetch_assoc()) {
    if ($linha['Nome_Maquina']) {
        echo "<div class='user'>
        <img src='data:image/jpeg;base64,".base64_encode($linha['IMG'])."'>
            <h2>" . $linha['Nome_Maquina'] . "</h2>
        </div>";
        $numAparelhosEmUso++;
    }

}
?>
<script>
    // Atualize o elemento h2 com o número de aparelhos em uso
    document.getElementById('textoDoBanco').textContent = "Total de aparelhos em uso: <?php echo $numAparelhosEmUso; ?>";
</script>
</div>
<!-- Adicione o código PHP abaixo do loop while para atualizar o elemento h2 -->
</div>

</div>
<!-- Adicione um botão ou outra interação do usuário para iniciar a leitura do QR Code -->
<button onclick="readQRCode()">Ler QR Code</button>

<!-- Adicione um elemento de vídeo para a exibição da câmera do dispositivo -->
<video id="video" width="300" height="200" style="display: none"></video>
        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
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
        dark_mode
    </span>
    <span class="material-icons-sharp">
        light_mode
    </span>
</div>

        <div class="profile">
            <div class="info">
            <p>Olá, <b><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Usuário' ?></b></p>
           
            </div>
        </div>
        <script>
        // Obter o nome de usuário da URL
            const urlParams = new URLSearchParams(window.location.search);
            const username = urlParams.get('username');

            // Atualizar o elemento HTML com o nome de usuário
            if (username) {
                document.getElementById('usernamePlaceholder').textContent = username;
            }
        </script>
    </div>
    <!-- End of Nav -->


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