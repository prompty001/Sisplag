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

    session_start();
    include ('config/painel.php');

    if (isset($_POST['enviar'])) {
        $login_usuario = $_POST['login_usuario'];
        $senha_usuario = $_POST['senha_usuario'];

        $sql = Conexao::conectar()->prepare("SELECT * FROM usuario WHERE login_usuario = ? AND senha_usuario = ?");
        $sql->execute(array($login_usuario,$senha_usuario));
        if($sql->rowCount() == 1){
            //Logado com Sucesso;
            $_SESSION['login'] = true;
            $_SESSION['login_usuario'] = $login_usuario;
            $_SESSION['senha_usuario'] = $senha_usuario;
            
        
            header('Location: pages/main.php');
            die();
    }else{
        echo "<div class='alert alert-danger' role='alert'> Usuário ou Senha Incorretos!</div>";
        }
    }
    ?>

    
    <div class="card-login">

        <img src="./assets/logo-CME.png" alt="logo" class="logo-card">
        <h2 class="titulo-login">Login</h2>

        <form method="POST">

            <div class="box-input">
                <label for="field-email" required>Login</label>
                <input type="text" name="login_usuario" class="field" id="field-email">
            </div>

            <div class="box-input">
                <label for="field-passwd" required>Senha</label>
                <input type="password" class="field" name="senha_usuario" id="field-passwd">
                </div>


            <button type="submit" class="button-login" type="button" name="enviar" >Entrar</button>

        </form>

    </div>

</body>
</html><?php ob_end_flush(); ?>