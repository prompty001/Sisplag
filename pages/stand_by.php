<?php
    ob_start();
    session_start();
        if (!isset($_SESSION['login']))
        {
            header("Location:../index.php");
        }       
?>

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

    <header class="header" id="header">
        <div class="header_toggle" id="header-toggle"><i class="gg-menu" id="bt-menu"></i></div>
        <button class="btn btn-dark"><a  href="stand_by.php" id="navbarDropdown">
                Usuário: 
               <?php echo $_SESSION['login_usuario']; ?>
        </a></button>

    </header>

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="stand_by.php" class="nav_logo">
                    <img src="../assets/new_sisplag.png" style="width: 38%" class="bx bx-layer nav_logo-icon">
                    <span class="nav_logo-name" ></span>
                </a>

                <div class=" nav_list">


                        <a href="stand_by.php" class="nav_link" id="cadastro">
                            <div class="grid-icon">
                                <i class="bi bi-grid-1x2"></i>
                                <span class="nav_name">Início</span>
                            </div>
                        </a>

                        <a href="perfil.php" class="nav_link" id="cadastro">
                            <div class="grid-icon">
                                </i><i class="bi bi-person-check"></i>
                                <span class="nav_name">Perfil</span>
                            </div>
                        </a>

                        <a href="cadastro_usuario.php" class="nav_link" id="cadastro">
                            <div class="grid-icon">
                                <i class="bi bi-person-plus"></i>
                                <span class="nav_name">Cadastrar Usuários</span>
                            </div>
                        </a>

                        <a href="cadastro_escola.php" class="nav_link" id="emprestimo">
                            <div class="grid-icon">
                                <i class="bi bi-house"></i>
                                <span class="nav_name">Cadastro de Escolas</span>
                            </div>
                        </a>

                        <a href="cadastro_escola.php" class="nav_link" id="emprestimo">
                            <div class="grid-icon">
                                <i class="bi bi-card-checklist"></i>
                                <span class="nav_name">Autorização de Cadastro <br>de Escolas</span>
                            </div>
                        </a>

                        <a href="consulta_escola.php" class="nav_link" id="ativos">
                            <div class="grid-icon">
                                <i class="bi bi-search"></i>
                                <span class="nav_name">Consulta de Escolas</span>
                            </div>
                        </a>

                        <a href="tab_graph.php" class="nav_link">
                            <div class="grid-icon">
                                <i class="bi bi-file-bar-graph"></i>
                                <span class="nav_name">Tabelas e Gráficos</span>
                            </div>
                        </a>

                        <a href="logout.php" class="nav_link">
                            <div class="grid-icon">
                                <i class="bi bi-x-square"></i>
                                <span class="nav_name">Logout</span>
                            </div>
                        </a>

            </div>
        </div>

    </nav>
    </div>
            
            <h1 class="welcome">Boas vindas ao Sistema de Planejamento e Gestão (Sisplag).</h1>



            <?php
                require_once('../config/painel.php');


                $consultaUsuario = Conexao::conectar()->prepare("SELECT count(id_usuario) AS total_usuario FROM USUARIO");
                $consultaUsuario->execute();
                $consultaUsuario = $consultaUsuario->fetchAll();
                ?>

                <?php foreach ($consultaUsuario as $consulta1) { ?>
            <div class="rightNav">
                <div class="box">
                <a href="cadastro_usuario.php" class="iconsSideNav"><p>Cadastro de Usuários<br/><span><?php echo $consulta1['total_usuario']; ?> usuário(s) cadastrado(s)</span></p> </a>
                <?php } ?>
                <a href="cadastro_usuario.php" class="iconsSideNav"><i class="bi bi-person-plus"></i></i></a>
                </div>
            </div>
            
            <?php
                require_once('../config/painel.php');

                $consultaAutorizacao = Conexao::conectar()->prepare("SELECT count(id_instituicao) AS total_pendente FROM instituicao WHERE status_inst='Não'");
                    $consultaAutorizacao->execute();
                    $consultaAutorizacao = $consultaAutorizacao->fetchAll();
            ?>

                <?php foreach ($consultaAutorizacao as $consulta2) { ?>
            <div class="rightNav">
                <div class="box">
                <a href="autorizacaoCadastro.php" class="iconsSideNav"><p>Autorização de Cadastro<br/><span><?php echo $consulta2['total_pendente']; ?>  escolas aguardando</span></p></a>
                <?php } ?>
                <a href="autorizacaoCadastro.php" class="iconsSideNav"><i class="bi bi-card-checklist"></i></a>
                </div>
            </div>

            <?php
                require_once('../config/painel.php');

                $consultaEscola = Conexao::conectar()->prepare("SELECT count(id_instituicao) AS total_escola FROM instituicao WHERE status_inst='Sim'");
                    $consultaEscola->execute();
                    $consultaEscola = $consultaEscola->fetchAll();
            ?>
            <?php foreach ($consultaEscola as $consulta3) { ?>
            <div class="rightNav">
                <div class="box">
                    <a href="consulta_escola.php" class="iconsSideNav"><p>Consulta de Escolas/Processos<br/><span><?php echo $consulta3['total_escola']; ?> escola(s) cadastrada(s)</span></p></a>
                    <?php } ?>
                    <a href="consulta_escola.php" class="iconsSideNav"><i class="bi bi-search"></i></a>
                </div>
            </div>

            <div class="rightNav">
                <div class="box">
                    <a href="tab_graph.php" class="iconsSideNav"><p>Tabelas e<br> Gráficos<br/><span></span></p></a>
                    <p></p>
                    <br>
                    <a position="center" href="tab_graph.php" class="iconsSideNav"><i class="bi bi-file-bar-graph"></i></a>
                </div>
            </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/painelAdmConfig.js"></script>
   
</body>

</html><?php ob_end_flush(); ?>