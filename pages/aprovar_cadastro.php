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
    <h2>APROVAR CADASTRO</h2>


    <?php
        require_once('../config/painel.php');

        $id_instituicao = (!empty($_GET['id_instituicao']) ? $_GET['id_instituicao'] : '');

        if (isset($_POST['aprovar'])) {
            
        
            $status_inst = 'Sim';
        
        
            $sql = Conexao::conectar()->prepare("UPDATE INSTITUICAO SET status_inst = ? WHERE id_instituicao=$id_instituicao");
            
            $sql->execute($staus_inst);
            Painel::alert('sucesso','Item atualizado com sucesso!');
            header("Location: autorizacaoCadastro.php");
        
        
        }

        $consulta = Conexao::conectar()->prepare("SELECT I.id_instituicao, I.nome_instituicao, T.nome_inst, S.sigla, D.distritoAdm, I.fundacao, I.codigo_inep, I.cnpj_escola, I.entidade_mantenedora, I.cnpj_conselho, I.vigencia_ce, I.cep_escola, I.uf, I.cidade, I.bairro, I.complemento, I.email_inst, I.telefone_inst, I.nome_gestor, I.email_gestor, I.whats_gestor, I.nome_secretario, I.whats_secretario, I.email_secretario, I.nome_coordenador, I.whats_coordenador, I.email_coordenador, I.convenio_semec, I.n_convenio, I.objeto, I.vigencia, I.educacao_infantil, I.fundamental, I.fundamental_eja, I.outros_niveis, I.status_inst 
                                                FROM instituicao I
                                                INNER JOIN  tipoinstituicao T
                                                    ON T.id_inst = I.fk_tipoInstituicao
                                                INNER JOIN siglainstituicao S
                                                    ON S.id_sigla = I.fk_sigla
                                                INNER JOIN distritoadm D 
                                                    ON D.id_distrito=I.fk_distrito
                                                WHERE id_instituicao=$id_instituicao;");
        $consulta->execute();
        $consulta = $consulta->fetchAll();

    ?>

    <div class=schoolForm>
        <div class=formPersonalData>
            <hr>
            <!--Cadastro da escola - Dados de identificação | Parte 1/4-->
            <form class="row g-3">
            <?php
                require_once('../config/painel.php');


                $consultaTudo = Conexao::conectar()->prepare("SELECT * FROM instituicao WHERE status_inst = 'Não'");
                $consultaTudo->execute();
                $consultaTudo = $consultaTudo->fetchAll();
                ?>

                <?php foreach ($consulta as $consulta) { ?>

                    <div class="col-md-6">
                        <label for="input" class="form-label">Nome Escola</label>
                        <input class="form-control" disabled placeholder="<?php echo $consulta['nome_instituicao']; ?>">
                    </div>
                    <div class="col-md-6">
                    <label for="input" class="form-label">Fundação</label>
                        <input class="form-control" disabled placeholder="<?php echo $consulta['fundacao']; ?>">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="inputAddress" disabled placeholder="<?php echo $consulta['complemento']; ?>">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">CEP</label>
                        <input type="text" class="form-control" id="inputAddress2" disabled placeholder="<?php echo $consulta['cep_escola']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Email Instituição</label>
                        <input class="form-control" disabled placeholder="<?php echo $consulta['email_inst']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">Telefone Instituição</label>
                        <input class="form-control" disabled placeholder="<?php echo $consulta['telefone_inst']; ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Convenio Semec</label>
                        <input class="form-control" disabled placeholder="<?php echo $consulta['convenio_semec']; ?>">
                    </div>
                    <div class="col-12">
                        <button type="submit" name="aprovar" class="btn btn-primary">Aprovar</button>
                    </div>
                <?php } ?>
                </form>

        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/painelAdmConfig.js"></script>
</body>
</html><?php ob_end_flush(); ?>