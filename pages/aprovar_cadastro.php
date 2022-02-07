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
    <h2>APROVAR CADASTRO</h2>


    <?php
        require_once('../config/conexao.php');
        require_once('../config/painel.php');

        $consulta = $conn->prepare("SELECT I.id_instituicao, I.nome_instituicao, T.nome_inst, S.sigla, D.distritoAdm 
                                        FROM instituicao I
                                        INNER JOIN  tipoinstituicao T
                                            ON T.id_inst = I.fk_tipoInstituicao
                                        INNER JOIN siglainstituicao S
                                            ON S.id_sigla = I.fk_sigla
                                        INNER JOIN distritoadm D 
                                            ON D.id_distrito=I.fk_distrito
                                        WHERE status_inst = 'Não'");
        $consulta->execute();
        $consulta = $consulta->fetchAll();

        $consultaTudo = $conn->prepare('SELECT * FROM instituicao');
        $consultaTudo->execute();
        $consultaTudo = $consultaTudo->fetchAll();

    ?>

    <div class=schoolForm>
        <div class=formPersonalData>
            <hr>
            <!--Cadastro da escola - Dados de identificação | Parte 1/4-->
            <form class="row g-3">
            <?php
                require_once('../config/conexao.php');
                require_once('../config/painel.php');


                $consultaTudo = $conn->prepare("SELECT * FROM instituicao WHERE status_inst = 'Não'");
                $consultaTudo->execute();
                $consultaTudo = $consultaTudo->fetchAll();
                ?>

                <?php foreach ($consultaTudo as $atualizar) { ?>

                    <div class="col-md-6">
                        <label for="input" class="form-label">Nome Escola</label>
                        <input class="form-control" disabled value="<?php echo $atualizar['nome_instituicao']; ?>">
                    </div>
                    <div class="col-md-6">
                    <label for="input" class="form-label">Fundação</label>
                        <input class="form-control" disabled value="<?php echo $atualizar['fundacao']; ?>">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="inputAddress" disabled value="<?php echo $atualizar['complemento']; ?>">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">CEP</label>
                        <input type="text" class="form-control" id="inputAddress2" disabled value="<?php echo $atualizar['cep_escola']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Email Instituição</label>
                        <input class="form-control" disabled value="<?php echo $atualizar['email_inst']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">Telefone Instituição</label>
                        <input class="form-control" disabled value="<?php echo $atualizar['telefone_inst']; ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Convenio Semec</label>
                        <input class="form-control" disabled value="<?php echo $atualizar['convenio_semec']; ?>">
                    </div>
                    <div class="col-12">
                        <button type="submit" name="aprovar" class="btn btn-primary">Aprovar</button>
                    </div>
                <?php } ?>
            </form>
            <div class="clearfix"></div>

        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/painelAdmConfig.js"></script>
</body>
</html>