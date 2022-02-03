<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/style_login.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>
<body>

<?php

    require_once('./config/conexao.php');
    require_once('./config/painel.php');

    if (isset($_POST['enviar'])) {
        $nome_usuario = $_POST['nome_usuario'];
        $senha_usuario = $_POST['senha_usuario'];

        $sql = $conn->prepare("SELECT * FROM usuario WHERE nome_usuario =
        '$nome_usuario' AND senha_usuario = '$senha_usuario'") or die("erro ao selecionar");
          
        header("Location: ./pages/main.php");
        
    }
?>
    
    <div class="card-login">

        <img src="./assets/logo-CME.png" alt="logo" class="logo-card">
        <h2 class="titulo-login">Login</h2>

        <form method="POST">

            <div class="box-input">

                <input type="text" name="nome_usuario" class="field" id="field-email">
                <label for="field-email" class="label-login" required>E-mail</label>

            </div>

            <div class="box-input">

                <input type="password" class="field" name="senha_usuario" id="field-passwd">
                <label for="field-passwd" class="label-login" required>Senha</label>

            </div>

            <button type="submit" class="button-login" type="button" name="enviar" >Entrar</button>

        </form>

    </div>

    <div class="progress">
        <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
      </div>

    <script>

        function styleLabel(field){

            let label = field.parentNode.querySelector(".label-login")

            if(field.value != ""){
                label.classList.add("label-active");
            } else {
                label.classList.remove("label-active");
            }

            
        }

        function addStyleLabel(field){

            let label = field.parentNode.querySelector(".label-login")

            label.classList.add("label-active")

        }

        document.addEventListener("DOMContentLoaded", () => {
            
            let fields = document.querySelectorAll(".field");

            fields.forEach( (field) => {

                field.addEventListener("blur", (event) => {
                    styleLabel(event.target)
                });

                field.addEventListener("focus", (event) => {
                    addStyleLabel(event.target)
                });

            })
        })
 

    </script>

</body>
</html>