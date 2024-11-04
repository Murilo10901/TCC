<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="graph.css">

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
                            <h1>GRÁFICOS DE APARELHOS UTILIZADOS</h1>
                               
                            <div>
                                <label for="dataSelect">Selecionar Dados:</label>
                                <select id="dataSelect">
                                    <option value="Segunda-feira">Segunda-feira</option>
                                    <option value="Terça-feira">Terça-feira</option>
                                    <option value="Quarta-feira">Quarta-feira</option>
                                    <option value="Quinta-feira">Quinta-feira</option>
                                    <option value="Sexta-feira">Sexta-feira</option>
                                    <option value="Sábado">Sábado</option>
                                    <option value="Domingo">Domingo</option>
                                </select>
                            </div>
                            <div>
                            <canvas id="myChart"></canvas>
                            </div>
                            </div>
                    </div>
                 </div>
                        
           <!--- End of Analyses -->

            <!-- New Users Section -->
            <div class="new-users">
                <h1>GRÁFICOS DE APARELHOS UTILIZADOS P/DIA</h1>
             
                    <div>
                    <div>
        <label for="dataSelect2">Selecionar Dia:</label>
        <select id="dataSelect2">
            <option value="Segunda-feira">Segunda-feira</option>
            <option value="Terça-feira">Terça-feira</option>
            <option value="Quarta-feira">Quarta-feira</option>
            <option value="Quinta-feira">Quinta-feira</option>
            <option value="Sexta-feira">Sexta-feira</option>
            <option value="Sábado">Sábado</option>
            <option value="Domingo">Domingo</option>
        </select>
    </div>
    <div>
        <label for="timeSelect">Selecionar Horário:</label>
        <select id="timeSelect">
            <?php
               for ($i = 0; $i < 24; $i++) {
                $hour = str_pad($i, 2, '0', STR_PAD_LEFT);
                echo "<option value='$hour:00'>$hour:00</option>";
            }
            
            ?>
        </select>
    </div>

    <div>
        <canvas id="myChart2"></canvas>
    </div>
   </div>
            </div>
           
            <!-- End of New Users Section -->

            <!-- Recent Orders Table -->
            <div class="new-users">
                <h1>GRÁFICOS DE APARELHOS UTILIZADOS P/HORA</h1>
    
                <div>
                    <canvas id="myNewChart"></canvas>
                </div>
                
                
            </div>
            <!-- End of Recent Orders -->
            <div class="new-users">
                <h1>GRÁFICOS DE APARELHOS UTILIZADOS P/HORA</h1>
                
                <div>
                    <canvas id="myNewChart2"></canvas>
                </div>
                
                       
        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
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
                    <?php
                        if (isset($_SESSION['username'])) {
                            echo "<p>Olá, <b>" . $_SESSION['username'] . "</b></p>";
                        } else {
                            echo "<p>Usuário não encontrado</p>";
                        }
                        ?>
                </div>

            </div>
            <!-- End of Nav -->
            </div>
        </div>
    </div>
   <script>
    document.addEventListener('DOMContentLoaded', function () {
        const mainElement = document.querySelector('main');
        mainElement.classList.add('fade-in');
    });
   </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="java/grafico1.js"></script>
    <script src="java/grafico2.js"></script>
    <script src="java/grafico3.js"></script>
    <script src="java/grafico4.js"></script>
    <script src="java/order.js"></script>
    <script src="java/index.js"></script>
</body>

</html>