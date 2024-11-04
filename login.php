<?php
session_start()

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MagniTech Login</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJOrZcZ+dCz2kNvBNn3bqy1CkS6UMJzQwVfRnBEot4MwMTI8FO5+YdzDtT1Gj5vc" crossorigin="anonymous">
    <link rel="icon" href="img/logo.ico" sizes="290x290">


</head>
<body>
    <header>
        <section id="header">
            <div class="header container">
              <div class="nav-bar">
                <div class="brand">
                  <a href="#hero">
                   
                  </a>
                </div>
                <div class="nav-list">
                  <div class="hamburger">
                    <div class="bar"></div>
                  </div>
                  <ul>
                    <li><a href="https://jovial-lollipop-81d6fd.netlify.app/" data-after="Sobre">Sobre - Nós</a></li>
                    
                  </ul>
                </div>
              </div>
            </div>
          </section>
    
        </header> 
    <div class="main-login">
        <div class="left-login">
            <h1>FAÇA O LOGIN<br><span style="color: #7c4a96"> E COMEÇE AGORA <BR></span></h1>
            <img src="img/new_trainee.svg" class="left-login-image">
                </div>
               
        <div class="right-login">
          <div class="card-login">
            <h1>LOGIN</h1>
            <form action="logar.php" class="form-login" method="POST">
                    <div class="textfield">
                        <div>
                            <label for="cpf">CPF</label>
                        </div>
                        <input type="text" name="CPF" placeholder="">
                        <div>
                            <label for="cpf">SENHA</label>
                        </div>
                        <input type="text" name="SENHA" placeholder="">
                        <input type="submit" value="Entrar" class="btn-login">
                    </div>
                    <div id="mensagem-erro"></div>
            </form>

             <p class="text center text-danger">
             <?php
              if (isset($_SESSION['erro_login'])) {
              echo '<span class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12s" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
              <path d="M8.83.087a1.75 1.75 0 0 0-3.66 0L.22 14.087A1.75 1.75 0 0 0 1.83 16h12.34a1.75 1.75 0 0 0 1.61-1.913L8.83.087zM7.5 11a1 1 0 1 1 2 0v1a1 1 0 0 1-2 0v-1zm.002-3a1 1 0 1 1 1-1 1 1 0 0 1-1 1z"/>
              </svg>' . $_SESSION['erro_login'] . '</span>';
             unset($_SESSION['erro_login']); 
               }
            ?>
           </p>        
        </div>           
        </div>              
       </div>
        </div>
    </div>
    <script src="java/app.js"></script>
</body>
</html>
