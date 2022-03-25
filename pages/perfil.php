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

    <header class="header" id="header">
        <div class="header_toggle" id="header-toggle"><i class="gg-menu" id="bt-menu"></i></div>
        <button class="btn btn-dark"><a  href="main.php" id="navbarDropdown">
                Usuário: 
               <?php echo $_SESSION['login_usuario']; ?>
        </a></button>

    </header>

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="main.php" class="nav_logo">
                    <img src="../assets/new_sisplag.png" style="width: 38%" class="bx bx-layer nav_logo-icon">
                    <span class="nav_logo-name" ></span>
                </a>

                <div class=" nav_list">



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
            <h1>SISPLAG</h1>
    <h2>DADOS DO USUÁRIO</h2>


    <?php
        include ('../config/painel.php');

        $id_usuario = (!empty($_GET['id_usuario']) ? $_GET['id_usuario'] : '');

        $consulta = Conexao::conectar()->prepare("SELECT * FROM USUARIO WHERE id_usuario=$id_usuario;");
        $consulta->execute();
        $consulta = $consulta->fetchAll();

        //print_r($consulta);

    ?>

    <div class=schoolForm>
        <div class=formPersonalData>
            <hr>
                <h3>Dados de Identificação</h3>
            <hr>
            <!--Cadastro da escola - Dados de identificação | Parte 1/4-->
            <form method="POST" class="row g-3">
            <?php foreach ($consulta as $consulta) { ?>
            
                    
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Cargo</label>
                    <input type="text" class="form-control" id="validationCustom01" name="fk_cargo" value="<?php echo $consulta['fk_cargo']; ?>" disabled >
                </div>

                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Nome Usuário</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_usuario" value="<?php echo $consulta['nome_usuario']; ?>" disabled>
                </div>

                <div class="col-md-3">
                    <label for="validationCustom02" class="form-label">Data de Nascimento</label>
                    <input type="date" class="form-control" id="validationCustom01" name="data_nascimento" value="<?php echo $consulta['data_nascimento']; ?>" disabled>
                </div>    
                <div class="col-md-3">
                    <label for="validationCustom03" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="validationCustom01" name="cpf_usuario" value="<?php echo $consulta['cpf_usuario']; ?>" disabled>
                </div>  
                
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Login</label>
                    <input type="text" class="form-control" id="validationCustom01" name="login_usuario" value="<?php echo $consulta['login_usuario']; ?>" disabled>
                </div>
                
                <div class="col-md-4">
                    <label for="validationCustom04" class="form-label">Email</label>
                    <input type="text" class="form-control" id="validationCustom01" name="email_usuario" value="<?php echo $consulta['email_usuario']; ?>" disabled>
                </div> 

                <div class="col-md-4">
                    <label for="validationCustom05" class="form-label">Início do Mandato</label>
                    <input type="date" class="form-control" id="validationCustom01" name="inicio_mandato" value="<?php echo $consulta['inicio_mandato']; ?>" disabled>
                </div> 
                <div class="col-md-4">
                    <label for="validationCustom06" class="form-label">Fim do Mandato</label>
                    <input type="date" class="form-control" id="validationCustom01" name="fim_mandato" value="<?php echo $consulta['fim_mandato']; ?>" disabled>
                </div>
                <?php } ?>

                <div>

                <hr>

                <button type="submit" class="btn btn-primary" type="button" name="enviar">Enviar</button>
            


            </form>

            

        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/painelAdmConfig.js"></script>
</body>
</html><?php ob_end_flush(); ?>