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
            <h3>Verificação de Cadastro da Escola</h3>


    <?php
        require_once('../config/painel.php');

        $id_instituicao = (!empty($_GET['id_instituicao']) ? $_GET['id_instituicao'] : '');

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

    <div class=schoolForm >
        <div class=formPersonalData>
            
            <hr>
            <!--Cadastro da escola - Dados de identificação | Parte 1/4-->
            <div id="dados">
            <form method="POST" class="row g-3">
            
            <?php foreach ($consulta as $consulta) { ?>
                <div class="col-md-2">
                    <label for="validationCustom01" class="form-label">Token Escola</label>
                    <input type="text" class="form-control" id="validationCustom01" name="id_instituicao" value="<?php echo $consulta['id_instituicao']; ?>" disabled>
                </div>

                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Tipo Escola</label>
                    <input type="text" class="form-control" id="validationCustom01" name="tipo" value="<?php echo $consulta['nome_inst']; ?>" disabled>
                </div>
                
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Sigla</label>
                    <input type="text" class="form-control" id="validationCustom01" name="sigla" value="<?php echo $consulta['sigla']; ?>" disabled>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Distrito Administrativo</label>
                    <input type="text" class="form-control" id="validationCustom01" name="distrito" value="<?php echo $consulta['distritoAdm']; ?>" disabled>
                </div>
            
                <div class="col-md-8">
                    <label for="validationCustom01" class="form-label">Nome Escola</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_instituicao" value="<?php echo $consulta['nome_instituicao']; ?>" disabled>
                    
                </div>    
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Fundação</label>
                    <input type="date" class="form-control" id="validationCustom01" name="fundacao" value="<?php echo $consulta['fundacao']; ?>" disabled>
                </div>    
                <div class="col-md-3">
                    <label for="validationCustom03" class="form-label">Codigo Inep</label>
                    <input type="text" class="form-control" id="validationCustom01" name="codigo_inep" value="<?php echo $consulta['codigo_inep']; ?>" disabled>
                    
                </div>    
                <div class="col-md-3">
                    <label for="validationCustom03" class="form-label">CNPJ</label>
                    <input type="text" class="form-control" id="validationCustom01" name="cnpj_escola" value="<?php echo $consulta['cnpj_escola']; ?>">
                </div>  

                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Entidade Mantenedora</label>
                    <input type="text" class="form-control" id="validationCustom01" name="entidade_mantenedora" value="<?php echo $consulta['entidade_mantenedora']; ?>" disabled>
                    
                </div> 

                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">CNPJ Conselho</label>
                    <input type="text" class="form-control" id="validationCustom01" name="cnpj_conselho" value="<?php echo $consulta['cnpj_conselho']; ?>" disabled>
                </div>
                

                <div class="col-md-6">
                    <label for="validationCustom05" class="form-label">Vigencia CE</label>
                    <input type="date" class="form-control" id="validationCustom01" name="vigencia_ce" value="<?php echo $consulta['vigencia_ce']; ?>" disabled>
                </div>

                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">CEP</label>
                    <input type="text" class="form-control" id="validationCustom01" name="cep_escola" value="<?php echo $consulta['cep_escola']; ?>" disabled>
                    
                </div>
                
                <div class="col-md-7">
                    <label for="validationCustom01" class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="validationCustom01" name="cidade" value="<?php echo $consulta['cidade']; ?>" disabled>
                    
                </div> 
                
                <div class="col-md-1">
                    <label for="validationCustom01" class="form-label">UF</label>
                    <input type="text" class="form-control" id="validationCustom01" name="uf" value="<?php echo $consulta['uf']; ?>" disabled>
                    
                </div> 
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="validationCustom01" name="complemento" value="<?php echo $consulta['complemento']; ?>" disabled>
                    
                </div>

                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Bairro</label>
                    <input type="text" class="form-control" id="validationCustom01" name="bairro" value="<?php echo $consulta['bairro']; ?>" disabled>
                    
                </div>


                <div class="col-md-5">
                    <label for="validationCustom01" class="form-label">Telefone</label>
                    <input type="text" class="form-control" id="validationCustom01" name="telefone_inst" value="<?php echo $consulta['telefone_inst']; ?>" disabled>
                    
                </div>

                <div class="col-md-5">
                    <label for="validationCustom04" class="form-label">Email</label>
                    <input type="text" class="form-control" id="validationCustom01" name="email_inst" value="<?php echo $consulta['email_inst']; ?>" disabled>
                </div> 
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Diretor</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_gestor" value="<?php echo $consulta['nome_gestor']; ?>" disabled>
                    
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Whatsapp</label>
                    <input type="text" class="form-control" id="validationCustom01" name="whats_gestor" value="<?php echo $consulta['whats_gestor']; ?>" disabled>
                    
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Email</label>
                    <input type="text" class="form-control" id="validationCustom01" name="email_gestor" value="<?php echo $consulta['email_gestor']; ?>" disabled>
                    
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Secretário</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_secretario" value="<?php echo $consulta['nome_secretario']; ?>" disabled>
                    
                </div>

                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Whatsapp</label>
                    <input type="text" class="form-control" id="validationCustom01" name="whats_secretario" value="<?php echo $consulta['whats_secretario']; ?>" disabled>
                    
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Email</label>
                    <input type="text" class="form-control" id="validationCustom01" name="email_secretario" value="<?php echo $consulta['email_secretario']; ?>" disabled>
                    
                </div>

                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Coordenador</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_coordenador" value="<?php echo $consulta['nome_coordenador']; ?>" disabled>
                    
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Whatsapp</label>
                    <input type="text" class="form-control" id="validationCustom01" name="whats_coordenador" value="<?php echo $consulta['whats_coordenador']; ?>" disabled>
                    
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Email</label>
                    <input type="text" class="form-control" id="validationCustom01" name="email_coordenador" value="<?php echo $consulta['email_coordenador']; ?>" disabled>
                    
                </div>
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Celebra Convenio SEMEC</label>
                    <input type="text" class="form-control" id="validationCustom01" name="convenio_semec" value="<?php echo $consulta['convenio_semec']; ?>" disabled>
                    
                </div>
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Nº do Convenio</label>
                    <input type="text" class="form-control" id="validationCustom01" name="n_convenio" value="<?php echo $consulta['n_convenio']; ?>" disabled>
                    
                </div>
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Educação Infantil</label>
                    <input type="text" class="form-control" id="validationCustom01" name="educacao_infantil" value="<?php echo $consulta['educacao_infantil']; ?>" disabled>
                    
                </div>
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Educação Fundamental</label>
                    <input type="text" class="form-control" id="validationCustom01" name="fundamental" value="<?php echo $consulta['fundamental']; ?>" disabled>
                    
                </div>
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Educação Fundamental EJA</label>
                    <input type="text" class="form-control" id="validationCustom01" name="fundamental_eja" value="<?php echo $consulta['fundamental_eja']; ?>" disabled>
                    
                </div>

                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Outros</label>
                    <input type="text" class="form-control" id="validationCustom01" name="outros_niveis" value="<?php echo $consulta['outros_niveis']; ?>" disabled>
                    
                </div>

            </div>
                <?php } ?>
                <div>

                <hr>

                <button type='button' class='btn btn-outline-info' value="imprimir" onclick="funcao_pdf()"><i class="bi bi-printer"> Imprimir</button></i></a>
            


            </form>


        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/painelAdmConfig.js"></script>
</body>

<script>
    function funcao_pdf(){
        var pegar = document.getElementById('dados').innerHTML;
        var janela = window.open('','', 'width=1500, height=1000');
        janela.document.write('<html><head>');
        janela.document.write('<style>button{padding-left:90px; margin-left: 5em}</style>');
        janela.document.write('<style>h3, h4, h5, h6, title{line-height: 0em; text-align: center; text-decoration: bold;}</style>');
        janela.document.write(`<style>input, textarea{border-color: #999; }</style>`);
        janela.document.write(`<style>input, textarea{font: 1em sans-serif; width: 1300px; -moz-box-sizing: border-box; box-sizing: border-box; border: 1px solid #999;}</style>`);
        janela.document.write('<style>form {margin: 1em; width: 1400px; padding: 1em;border: 1px solid #CCC; border-radius: 1em;}</style>');
        janela.document.write('<style>label{display: inline-flex; width: 90px; text-align: justify;}</style>');
        janela.document.write('<style> form div + div { margin-top: 1em;</style>');
        
        janela.document.write('<h5>PREFEITURA DE BELÉM</h5>');
        janela.document.write('<h5>CONSELHO MUNICIPAL DE EDUCAÇÃO</h5>');
        janela.document.write('<h5>SISTEMA DE PLANEJAMENTO E GESTÃO</h5>');
        janela.document.write('<hr>');
        janela.document.write('<h6> Verificação de Cadastro de Escola</h6>');
        janela.document.write('</body>');
        janela.document.write(pegar);
        janela.document.write('</body></html>');
        janela.document.close();
        janela.print();
    }

</script>
</html><?php ob_end_flush(); ?>