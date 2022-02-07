<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/painelAdmStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <title>Autorização de Cadastro | Sisplag</title></head>
<body>
    <div class="sideNav">
        <div class="logo">
            <img src=../assets/new_sisplag.png>
        </div>
        
        <div class="itemsSideNav">
            <a href="painelAdm.php" class="iconsSideNav"><i class="icons"><img src="https://img.icons8.com/external-kmg-design-glyph-kmg-design/54/000000/external-dashboard-ui-essential-kmg-design-glyph-kmg-design.png" class="dashboardIcons"></i>&nbsp;&nbsp;<span class="teste">Início</span></a>
            <a href="#" class="iconsSideNav"><i class="icons"><img src="https://img.icons8.com/external-vitaliy-gorbachev-fill-vitaly-gorbachev/54/000000/external-profile-blogger-vitaliy-gorbachev-fill-vitaly-gorbachev.png" class="userIcons"></i>&nbsp;&nbsp;<span class="teste">Perfil</span></a>
            <a href="cadastro_usuario.php" class="iconsSideNav"><i class="icons"><img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/54/000000/external-users-cyber-security-kiranshastry-solid-kiranshastry.png" class="userRegIcons"></i>&nbsp;&nbsp;<span class="teste">Cadastro de Usuários</span></a>
            <a href="../autorizacao-cadastro/autorizacaoCadastro.html" class="iconsSideNav"><i class="icons"><img src="https://img.icons8.com/ios-filled/50/000000/approval.png" class="authorizationIcons"></i>&nbsp;&nbsp;<span class="teste">Autorização de Cadastro</span></a>
            <a href="consulta_escola.php" class="iconsSideNav"><i class="icons"><img src="https://img.icons8.com/external-itim2101-fill-itim2101/54/000000/external-school-back-to-school-itim2101-fill-itim2101.png" class="consultationIcons"></i>&nbsp;&nbsp;<span class="teste">Consulta de Escolas/Processos</span></a>
            <a href="#" class="iconsSideNav"><i class="icons"><img src="https://img.icons8.com/external-vitaliy-gorbachev-fill-vitaly-gorbachev/54/000000/external-graph-business-vitaliy-gorbachev-fill-vitaly-gorbachev-1.png" class="tablesIcons"></i>&nbsp;&nbsp;<span class="teste"><span>Tabelas e Gráficos</span></span></a>
            <a href="#" class="iconsSideNav"><i class="icons"><img src="https://img.icons8.com/external-sbts2018-solid-sbts2018/54/000000/external-logout-social-media-sbts2018-solid-sbts2018.png" class="logoutIcons"></i>&nbsp;&nbsp;<span class="teste">Logout</span></a>
            
        </div>
    
    </div>

    <div id="main">
        <div class="head">
            <div class="dashboardButton">
                
                <div class="buttonOne">
                    <span style="font-size: 30px; cursor: pointer; color: black; font-weight: bold;" class="navOne">&#8676;</span> <!--&#9776;-->
                </div>

                <div class="buttonTwo">
                    <span style="font-size: 30px; cursor: pointer; color: black; font-weight: bold;" class="navTwo">&#8677;</span>
                </div>   
                 
            </div>

            <div class="clearfix"></div>

            <h1>SISPLAG</h1>
    <h2>CADASTRO DE USUÁRIOS</h2>


    <?php
        require_once('../config/conexao.php');

        if(isset($_POST['enviar'])){
            $nome_usuario = $_POST['nome_usuario'];
            $cpf_usuario = $_POST['cpf_usuario'];
            $email_usuario = $_POST['email_usuario'];
            $senha_usuario = $_POST['senha_usuario'];
            $inicio_mandato = $_POST['inicio_mandato'];
            $fim_mandato = $_POST['fim_mandato'];
            $data_nascimento = $_POST['data_nascimento'];
            $fk_cargo = $_POST['fk_cargo'];
            $fk_tipousuario = $_POST['fk_tipousuario'];

            $cadastroUsuario = $conn->prepare("INSERT INTO USUARIO (nome_usuario, cpf_usuario, email_usuario, senha_usuario, inicio_mandato, fim_mandato, data_nascimento, fk_cargo, fk_tipousuario) VALUES ('$nome_usuario', '$cpf_usuario', '$email_usuario', '$senha_usuario', '$inicio_mandato', '$fim_mandato', '$data_nascimento', '$fk_cargo', '$fk_tipousuario')");

            $cadastroUsuario->execute();
        }

    ?>

    <div class=schoolForm>
        <div class=formPersonalData>
            <hr>
                <h3>Dados de Identificação</h3>
            <hr>
            <!--Cadastro da escola - Dados de identificação | Parte 1/4-->
            <form method="POST">
            <label>Cargo</label>
                <select class="form-control" id="school-acronym" style="flex-grow: 2" name="fk_cargo">
                        <option value="selecopo" > -- Selecione Opção --</option>
                        <!-- Consulta no banco - Cargos dos Servidores--->
                        <?php
                            $consultaCargo = $conn->prepare('SELECT * FROM cargo');
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

                    <label>Tipo Usuário</label>
                <select class="form-control" id="school-acronym" style="flex-grow: 1" name="fk_tipousuario">
                        <option value="selecopo" > -- Selecione Opção --</option>
                        <!-- Consulta no banco - Tipo de Usuario--->
                        <?php
                            $consultaTipoUsuario = $conn->prepare('SELECT * FROM tipousuario');
                            $consultaTipoUsuario->execute();
                            $consultaTipoUsuario = $consultaTipoUsuario->fetchAll();
                            foreach ($consultaTipoUsuario as $consultaTipoUsuario) {
                            ?>
                                <option value="<?php echo $consultaTipoUsuario['id_tipousuario']; ?>">
                                    <?php echo $consultaTipoUsuario['tipoUsuario']; ?>
                                </option>
                            <?php } ?>
                        ?>
                        </select>

                <div>
                <label>Usuário</label>
                <input type="text" class="form-control" name="nome_usuario" placeholder="Nome do Usuario" required>
                <label>Data de Nascimento</label>
                <input type="text" class="form-control" name="data_nascimento" date="dataNascimento" placeholder="Data de nascimento" required ><br>
                <label>CPF</label>
                <input type="text" class="form-control" name="cpf_usuario" placeholder="CPF" required><br>

                <div>
                <label>Email</label>
                <input type="text" class="form-control" name="email_usuario" placeholder="E-mail" required>
                <label>Senha</label>
                <input type="text" class="form-control" name="senha_usuario" placeholder="Senha" required><br>

                <div>
                <label>Início do Mandato</label>
                <input type="text" class="form-control" name="inicio_mandato" date="inicioMandato" placeholder="Início Mandato" required>
                <label>Fim do Mandato</label>
                <input type="text" class="form-control" name="fim_mandato" date="fimMandato" placeholder="Fim Mandato" required>

                <div>

                <button type="submit" class="btn btn-primary" type="button" name="enviar">Enviar</button>
            


            </form>

            <div class="clearfix"></div>

        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/painelAdmConfig.js"></script>
</body>
</html>