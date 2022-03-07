<!DOCTYPE html>
<html lang="pt">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/painelAdmStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="../lib/mask/script_mask.js" defer></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Empréstimo de Maletas</title>
    <link rel="shortcut icon" href="../imgs/sisplag_fundo.jpeg" type="image/x-icon">

    <script src="../lib/jquery/jquery.js" defer></script>

    <script src="../lib/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <script src="../js/script_main.js" defer></script>
    <link rel="stylesheet" href="../css/style_main.css">

    <script src="../lib/mask/script_mask.js" defer></script>

    <link rel="stylesheet" href="../lib/icons/css/icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">



</head>

<body id="body-pd">

            <h1>SISPLAG</h1>
    <h2>CADASTRO DE USUÁRIOS</h2>


    <?php
        include ('../config/painel.php');

        if(isset($_POST['enviar'])){
            $nome_usuario = $_POST['nome_usuario'];
            $cpf_usuario = $_POST['cpf_usuario'];
            $email_usuario = $_POST['email_usuario'];
            $login_usuario = $_POST['login_usuario'];
            $senha_usuario = $_POST['senha_usuario'];
            $inicio_mandato = $_POST['inicio_mandato'];
            $fim_mandato = $_POST['fim_mandato'];
            $data_nascimento = $_POST['data_nascimento'];
            $fk_cargo = $_POST['fk_cargo'];

            $cadastroUsuario = Conexao::conectar()->prepare("INSERT INTO USUARIO (nome_usuario, cpf_usuario, email_usuario, login_usuario, senha_usuario, inicio_mandato, fim_mandato, data_nascimento, fk_cargo) VALUES ('$nome_usuario', '$cpf_usuario', '$email_usuario', '$login_usuario', '$senha_usuario', '$inicio_mandato', '$fim_mandato', '$data_nascimento', '$fk_cargo')");

            $cadastroUsuario->execute();
            Painel::alert('sucesso',' cadastro realizado com sucesso!');
            header("Location: main.php");
        }

    ?>

    <div class=schoolForm>
        <div class=formPersonalData>
            <hr>
                <h3>Dados de Identificação</h3>
            <hr>
            <!--Cadastro da escola - Dados de identificação | Parte 1/4-->
            <form method="POST" class="row g-3">
            <label>Cargo</label>
            <div>
                <select class="form-control" id="school-acronym" style="flex-grow: 2" name="fk_cargo">
                        <option value="selecopo" > -- Selecione Opção --</option>
                        <!-- Consulta no banco - Cargos dos Servidores--->
                        <?php
                            $consultaCargo = Conexao::conectar()->prepare('SELECT * FROM cargo');
                            $consultaCargo->execute();
                            $consultaCargo = $consultaCargo->fetchAll();
                            foreach ($consultaCargo as $consultaCargo) {
                            ?>
                                <option value="<?php echo $consultaCargo['id_cargo']; ?>">
                                    <?php echo $consultaCargo['cargo']; ?>
                                </option>
                            <?php } ?>
                        ?>
                    </select>
                    </div>
                    
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Nome Usuário</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_usuario" placeholder="Nome do Usuario" required>
                    <div class="valid-feedback">
                        Nome não inserido!
                    </div>
                </div>

                <div class="col-md-3">
                    <label for="validationCustom02" class="form-label">Data de Nascimento</label>
                    <input type="date" class="form-control" id="validationCustom01" name="data_nascimento" required>
                </div>    
                <div class="col-md-3">
                    <label for="validationCustom03" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="validationCustom01" name="cpf_usuario" required onkeypress="$(this).mask('000.000.000-00')">
                    <label class="exemplo">Ex: 000.111.222-33</label>
                    <div class="valid-feedback">
                        CPF inválido!
                    </div>
                </div>  
                
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Login</label>
                    <input type="text" class="form-control" id="validationCustom01" name="login_usuario" placeholder="Login do Usuario" required>
                    <div class="valid-feedback">
                        Dados Incorretos!
                    </div>
                </div>
                
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="validationCustom01" name="senha_usuario" placeholder="Senha do Usuario" required>
                    <div class="valid-feedback">
                        Dados Incorretos!
                    </div>
                </div>
                
                
                <div class="col-md-4">
                    <label for="validationCustom04" class="form-label">Email</label>
                    <input type="text" class="form-control" id="validationCustom01" name="email_usuario" placeholder="E-mail" required>
                    <label class="exemplo">Ex: joao_bosco@gmail.com</label>
                    <div class="valid-feedback">
                        Email inválido!
                    </div>
                </div> 

                <div class="col-md-4">
                    <label for="validationCustom05" class="form-label">Início do Mandato</label>
                    <input type="date" class="form-control" id="validationCustom01" name="inicio_mandato" required>
                    <div class="valid-feedback">
                        Data inválida!
                    </div>
                </div> 
                <div class="col-md-4">
                    <label for="validationCustom06" class="form-label">Fim do Mandato</label>
                    <input type="date" class="form-control" id="validationCustom01" name="fim_mandato" required>
                    <div class="valid-feedback">
                        Data inválida!
                    </div>
                </div>

                <div>

                <hr>

                <button type="submit" class="btn btn-primary" type="button" name="enviar">Enviar</button>
            


            </form>

            <div class="clearfix"></div>

        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/painelAdmConfig.js"></script>
</body>
</html>