<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/painelAdmStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="../lib/mask/script_mask.js" defer></script>

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
            <a href="autorizacaoCadastro.php" class="iconsSideNav"><i class="icons"><img src="https://img.icons8.com/ios-filled/50/000000/approval.png" class="authorizationIcons"></i>&nbsp;&nbsp;<span class="teste">Autorização de Cadastro</span></a>
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
            <h3>Verificação de Cadastro da Escola</h3>


    <?php
        require_once('../config/conexao.php');
        require_once('../config/painel.php');

        $id_instituicao = (!empty($_GET['id_instituicao']) ? $_GET['id_instituicao'] : '');

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
            <!--Cadastro da escola - Dados de identificação | Parte 1/4-->
            <form method="POST" class="row g-3">
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Tipo Escola</label>
                    <input type="text" class="form-control" id="validationCustom01" name="tipo" >
                </div>
                
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Sigla</label>
                    <input type="text" class="form-control" id="validationCustom01" name="sigla">
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Distrito Administrativo</label>
                    <input type="text" class="form-control" id="validationCustom01" name="distrito" >
                </div>
            
                <div class="col-md-8">
                    <label for="validationCustom01" class="form-label">Nome Escola</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_usuario" placeholder="Nome do Usuario" required>
                    
                </div>    
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Fundação</label>
                    <input type="date" class="form-control" id="validationCustom01" name="data_nascimento" required>
                </div>    
                <div class="col-md-3">
                    <label for="validationCustom03" class="form-label">Codigo Inep</label>
                    <input type="text" class="form-control" id="validationCustom01" name="cpf_usuario" required onkeypress="$(this).mask('000.000.000-00')">
                    <label class="exemplo">Ex: 000.111.222-33</label>
                    <div class="valid-feedback">
                        CPF inválido!
                    </div>
                </div>    
                <div class="col-md-3">
                    <label for="validationCustom03" class="form-label">CNPJ</label>
                    <input type="text" class="form-control" id="validationCustom01" name="cpf_usuario" required onkeypress="$(this).mask('000.000.000-00')">
                    <label class="exemplo">Ex: 000.111.222-33</label>
                    <div class="valid-feedback">
                        CPF inválido!
                    </div>
                </div>  

                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Entidade Mantenedora</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_usuario" placeholder="Nome do Usuario" required>
                    
                </div> 

                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">CNPJ Conselho</label>
                    <input type="text" class="form-control" id="validationCustom01" name="cpf_usuario" required onkeypress="$(this).mask('000.000.000-00')">
                    <label class="exemplo">Ex: 000.111.222-33</label>
                    <div class="valid-feedback">
                        CPF inválido!
                    </div>
                </div>
                

                <div class="col-md-6">
                    <label for="validationCustom05" class="form-label">Vigencia CE</label>
                    <input type="date" class="form-control" id="validationCustom01" name="inicio_mandato" required>
                    <div class="valid-feedback">
                        Data inválida!
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">CEP</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_usuario" placeholder="Nome do Usuario" required>
                    
                </div>
                
                <div class="col-md-7">
                    <label for="validationCustom01" class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_usuario" placeholder="Nome do Usuario" required>
                    
                </div> 
                
                <div class="col-md-1">
                    <label for="validationCustom01" class="form-label">UF</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_usuario" placeholder="Nome do Usuario" required>
                    
                </div> 
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_usuario" placeholder="Nome do Usuario" required>
                    
                </div>

                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Bairro</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_usuario" placeholder="Nome do Usuario" required>
                    
                </div>


                <div class="col-md-5">
                    <label for="validationCustom01" class="form-label">Telefone</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_usuario" placeholder="Nome do Usuario" required>
                    
                </div>

                <div class="col-md-5">
                    <label for="validationCustom04" class="form-label">Email</label>
                    <input type="text" class="form-control" id="validationCustom01" name="email_usuario" placeholder="E-mail" required>
                    <label class="exemplo">Ex: joao_bosco@gmail.com</label>
                    <div class="valid-feedback">
                        Email inválido!
                    </div>
                </div> 
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Diretor</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_usuario" placeholder="Nome do Usuario" required>
                    
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Whatsapp</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_usuario" placeholder="Nome do Usuario" required>
                    
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Email</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_usuario" placeholder="Nome do Usuario" required>
                    
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Secretário</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_usuario" placeholder="Nome do Usuario" required>
                    
                </div>

                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Whatsapp</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_usuario" placeholder="Nome do Usuario" required>
                    
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Email</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_usuario" placeholder="Nome do Usuario" required>
                    
                </div>

                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Coordenador</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_usuario" placeholder="Nome do Usuario" required>
                    
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Whatsapp</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_usuario" placeholder="Nome do Usuario" required>
                    
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Email</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_usuario" placeholder="Nome do Usuario" required>
                    
                </div>
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Celebra Convenio SEMEC</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_usuario" placeholder="Nome do Usuario" required>
                    
                </div>
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Nº do Convenio</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_usuario" placeholder="Nome do Usuario" required>
                    
                </div>
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Modalidades da Educação Básica</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_usuario" placeholder="Nome do Usuario" required>
                    
                </div>
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Educação Fundamental</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_usuario" placeholder="Nome do Usuario" required>
                    
                </div>
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Educação Fundamental EJA</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_usuario" placeholder="Nome do Usuario" required>
                    
                </div>

                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Outros</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_usuario" placeholder="Nome do Usuario" required>
                    
                </div>
              
                <div>

                <hr>

                <button type="submit" class="btn btn-primary" type="button" name="enviar">Atualizar</button>
            


            </form>

            <div class="clearfix"></div>

        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/painelAdmConfig.js"></script>
</body>
</html>