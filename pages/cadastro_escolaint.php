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
    <title>Cadastro de Escolas</title>
    <link rel="shortcut icon" href="../imgs/sisplag_fundo.jpeg" type="image/x-icon">
    <script src="../lib/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.css">
    <script src="../lib/mask/script_mask.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <script src="../lib/jquery/jquery.js" defer></script>

    
    

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <script src="../js/script_main.js" defer></script>
    <link rel="stylesheet" href="../css/style_main.css">
    <script src="../lib/mask/script_mask.js" defer></script>


    

    <link rel="stylesheet" href="../lib/icons/css/icons.css">
    


</head>

<body id="body-pd">
<?php
        require_once('../config/painel.php');

       

        $consulta = Conexao::conectar()->prepare("SELECT * FROM usuario");
        $consulta->execute();
        $consulta = $consulta->fetchAll();

    ?>


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


                        <a href="main.php" class="nav_link" id="cadastro">
                            <div class="grid-icon">
                                <i class="bi bi-grid-1x2"></i>
                                <span class="nav_name">Início</span>
                            </div>
                        </a>

                        <?php 
                            $id_usuario = 0;
                            foreach($consulta as $consulta){
                                $id_usuario = $consulta['id_usuario']
                        ?>

                        <?php echo "<a href='perfil.php?id_usuario=$id_usuario' class='nav_link' id='cadastro'>" ?>
                            <div class="grid-icon">
                                </i><i class="bi bi-person-check"></i>
                                <span class="nav_name">Perfil</span>
                            </div>
                        </a>

                        <?php } ?>

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


            <h1>SISPLAG</h1>
    <h2>CADASTRO DE ESCOLA</h2>


    <?php
         require_once('../config/painel.php');


         if(isset($_POST['enviar'])){
             $fk_tipoInstituicao = $_POST['radioTypeSchool'];
             $fk_sigla = $_POST['fk_sigla'];
             $fk_distrito = $_POST['fk_distrito'];
             $nome_instituicao = $_POST['nome_instituicao'];
             $fundacao = $_POST['fundacao'];
             $codigo_inep = $_POST['codigo_inep'];
             $cnpj_escola = $_POST['cnpj_escola'];
             $entidade_mantenedora = $_POST['entidade_mantenedora'];
             $cnpj_conselho = $_POST['cnpj_conselho'];
             $vigencia_ce= $_POST['vigencia_ce'];
             $cidade = $_POST['cidade'];
             $uf = $_POST['uf'];
             $complemento = $_POST['complemento'];
             $bairro = $_POST['bairro'];
             $cep_escola = $_POST['cep_escola'];
             $telefone_inst = $_POST['telefone_inst'];
             $email_inst = $_POST['email_inst'];
             $nome_gestor = $_POST['nome_gestor'];
             $whats_gestor = $_POST['whats_gestor'];
             $email_gestor = $_POST['email_gestor'];
             $nome_secretario = $_POST['nome_secretario'];
             $whats_secretario = $_POST['whats_secretario'];
             $email_secretario = $_POST['email_secretario'];
             $nome_coordenador = $_POST['nome_coordenador'];
             $whats_coordenador = $_POST['whats_coordenador'];
             $email_coordenador = $_POST['email_coordenador'];
 
             $convenio_semec = $_POST['convenio_semec'];
             $n_convenio = $_POST['n_convenio'];
             $objeto = $_POST['objeto'];
             $vigencia = $_POST['vigencia'];
             $educacao_infantil = $_POST['educacao_infantil'];
             $fundamental = $_POST['fundamental'];
             $fundamental_eja = $_POST['fundamental_eja'];
             $outros_niveis = $_POST['outros_niveis'];
 
 
             $cadastroEscola = Conexao::conectar()->prepare("INSERT INTO INSTITUICAO (fk_tipoInstituicao, fk_sigla, fk_distrito, nome_instituicao, fundacao, codigo_inep, cnpj_escola, entidade_mantenedora, cnpj_conselho, vigencia_ce, cep_escola, uf, cidade, bairro, complemento, email_inst, telefone_inst, nome_gestor, email_gestor, whats_gestor, nome_secretario, email_secretario, whats_secretario, nome_coordenador, email_coordenador, whats_coordenador, convenio_semec, n_convenio, objeto, vigencia, educacao_infantil, fundamental, fundamental_eja, outros_niveis) VALUES ('$fk_tipoInstituicao', '$fk_sigla', '$fk_distrito', '$nome_instituicao', '$fundacao', '$codigo_inep', '$cnpj_escola', '$entidade_mantenedora', '$cnpj_conselho', '$vigencia_ce', '$cep_escola', '$uf',  '$cidade', '$bairro', '$complemento', '$email_inst', '$telefone_inst', '$nome_gestor', '$email_gestor', '$whats_gestor', '$nome_secretario', '$email_secretario', '$whats_secretario', '$nome_coordenador', '$email_coordenador', '$whats_coordenador', '$convenio_semec', '$n_convenio', '$objeto', '$vigencia', '$educacao_infantil', '$fundamental', '$fundamental_eja', '$outros_niveis')");
 
             $cadastroEscola->execute();
            Painel::alert('sucesso',' cadastro realizado com sucesso!');
            header("Location: main.php");
            
        }

    ?>

    <div class=schoolForm>
        <div class=formPersonalData>
            <hr>
                <div style="background-color: #c3dfff; text-align: center; height: 2.5em; border-radius: 2em; padding-top: 0.5em; padding-bottom: 1em;">
                    <h3>Dados de Identificação</h3><br>
                </div>
            <hr>
            <!--Cadastro da escola - Dados de identificação | Parte 1/4-->
        <form method="POST" class="row g-3">
        <div>
            <label class="form-check-label" for="flexRadioDefault1">Tipo de Escola</label><br>
            <input type="radio" name="radioTypeSchool" value="1" onclick="handleClickType(this)">
            <label class="label" for="public">Pública</label>
            <input type="radio" name="radioTypeSchool" value="2" onclick="handleClickType(this)">
            <label class="label" for="public">Privada</label><br>      
            </div>
            <div>
                    <label>Sigla</label>
                <select class="form-control" id="school-acronym" style="flex-grow: 1" name="fk_sigla">
                <option>-Sigla-</SIGLA></option>
                    <!-- Consulta no banco - Siglas--->
                    <?php
                        $consultaSigla = Conexao::conectar()->prepare('SELECT * FROM siglainstituicao');
                        $consultaSigla->execute();
                        $consultaSigla = $consultaSigla->fetchAll();
                        foreach ($consultaSigla as $consultaSigla) {
                        ?>
                            <option value="<?php echo $consultaSigla['id_sigla']; ?>">
                                <?php echo $consultaSigla['sigla']; ?>
                            </option>
                        <?php } ?>
                    ?>
                        </select>

                        </div>
            <div>
            <label>Distrito Adm</label>
                <select class="form-control" id="school-acronym" style="flex-grow: 1" name="fk_distrito">
                <option >- Distrito -</option>
                    <!-- Consulta no banco - Distritos ADM--->
                    <?php
                        $consultaCargo = Conexao::conectar()->prepare('SELECT * FROM distritoadm');
                        $consultaCargo->execute();
                        $consultaCargo = $consultaCargo->fetchAll();
                        foreach ($consultaCargo as $consultaCargo) {
                        ?>
                            <option value="<?php echo $consultaCargo['id_distrito']; ?>">
                                <?php echo $consultaCargo['distritoAdm']; ?>
                            </option>
                        <?php } ?>
                    ?>
                </select><br>

            </div>
            <div class="col-md-5">
                    <label for="validationCustom01" class="form-label">Nome da Escola</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_instituicao" placeholder="Nome do Usuario" required>
                    <div class="valid-feedback">
                        Nome não inserido!
                    </div>
                </div>

                <div class="col-md-2">
                    <label for="validationCustom02" class="form-label">Data de Fundação</label>
                    <input type="date" class="form-control" id="validationCustom01" name="fundacao" required>
                </div>  
                
                <div class="col-md-2">
                    <label for="validationCustom03" class="form-label">Codigo do INEP</label>
                    <input type="text" class="form-control" id="validationCustom01" name="codigo_inep" required onkeypress="$(this).mask('00000000')">
                    <label class="exemplo">Ex: 13082175</label>
                    <div class="valid-feedback">
                        Código inválido!
                    </div>
                </div>

                <div class="col-md-3">
                    <label for="validationCustom03" class="form-label">CNPJ da Instituição</label>
                    <input type="text" class="form-control" id="validationCustom01" name="cnpj_escola" required onkeypress="$(this).mask('00.000.000/0001-00')">
                    <label class="exemplo">Ex: 00.111.222/3333-44</label>
                    <div class="valid-feedback">
                        CNPJ inválido!
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Entidade Mantenedora</label>
                    <input type="text" class="form-control" id="validationCustom01" name="entidade_mantenedora" placeholder="Entidade Mantenedora">
                    <div class="valid-feedback">
                        Dados Incorretos!
                    </div>
                </div>

                <div class="col-md-3">
                    <label for="validationCustom03" class="form-label">CNPJ Conselho</label>
                    <input type="text" class="form-control" id="validationCustom01" name="cnpj_conselho" required onkeypress="$(this).mask('00.000.000/0001-00')">
                    <label class="exemplo">Ex: 00.111.222/3333-44</label>
                    <div class="valid-feedback">
                        CNPJ inválido!
                    </div>
                </div>
                
                <div class="col-md-3">
                    <label for="validationCustom02" class="form-label">Vigência CE</label>
                    <input type="date" class="form-control" id="validationCustom01" name="vigencia_ce" required>
                </div>

                <div class="col-md-2">
                    <label for="validationCustom03" class="form-label">CEP</label>
                    <input type="text" class="form-control" id="validationCustom01" name="cep_escola" required onkeypress="$(this).mask('00000.000')">
                    <label class="exemplo">Ex: 66045.823</label>
                    <div class="valid-feedback">
                        CEP inválido!
                    </div>
                </div>

                <div class="col-md-3">
                    <label for="validationCustom01" class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="validationCustom01" name="cidade" placeholder="Nome do Usuario" value="Belém" required>
                    <div class="valid-feedback">
                        Nome não inserido!
                    </div>
                </div>
                  
    
                <div class="col-md-1">
                    <label for="validationCustom01" class="form-label">UF</label>
                    <input type="text" class="form-control" id="validationCustom01" name="uf" placeholder="UF" value="PA" required>
                    <div class="valid-feedback">
                        Nome não inserido!
                    </div>
                </div>

                <div class="col-md-3">
                    <label for="validationCustom01" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="validationCustom01" name="complemento" placeholder="Nome do Usuario" required>
                    <div class="valid-feedback">
                        Nome não inserido!
                    </div>
                </div>

                <div class="col-md-3">
                    <label for="validationCustom01" class="form-label">Bairro</label>
                    <input type="text" class="form-control" id="validationCustom01" name="bairro" placeholder="Nome do Usuario" required>
                    <div class="valid-feedback">
                        Nome não inserido!
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="validationCustom03" class="form-label">Telefone</label>
                    <input type="text" class="form-control" id="validationCustom01" name="telefone_inst" required onkeypress="$(this).mask('(00)00000-0000')">
                    <label class="exemplo">Ex: (91)98877-4455</label>
                    <div class="valid-feedback">
                        Número inválido!
                    </div>
                </div>


                <div class="col-md-8">
                    <label for="validationCustom04" class="form-label">Email</label>
                    <input type="text" class="form-control" id="validationCustom01" name="email_inst" placeholder="E-mail" required>
                    <label class="exemplo">Ex: joao_bosco@gmail.com</label>
                    <div class="valid-feedback">
                        Email inválido!
                    </div>
                </div> 

                <div class="col-md-5">
                    <label for="validationCustom04" class="form-label">Diretor(a)</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_gestor" placeholder="Nome do Diretor(a)" required>
                    <label class="exemplo">Ex: joao_bosco@gmail.com</label>
                    <div class="valid-feedback">
                        Email inválido!
                    </div>
                </div>

                <div class="col-md-2">
                    <label for="validationCustom03" class="form-label">Whatsapp Diretor</label>
                    <input type="text" class="form-control" id="validationCustom01" name="whats_gestor" required onkeypress="$(this).mask('(00)00000-0000')">
                    <div class="valid-feedback">
                        Número inválido!
                    </div>
                </div>


                <div class="col-md-5">
                    <label for="validationCustom04" class="form-label">Email Diretor</label>
                    <input type="text" class="form-control" id="validationCustom01" name="email_gestor" placeholder="E-mail" required>
                    <div class="valid-feedback">
                        Email inválido!
                    </div>
                </div> 

                <div class="col-md-5">
                    <label for="validationCustom04" class="form-label">Secretario(a)</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_secretario" placeholder="Nome do Secretário">
                    <div class="valid-feedback">
                        Nome inválido!
                    </div>
                </div>

                <div class="col-md-2">
                    <label for="validationCustom03" class="form-label">Whatsapp Secretario</label>
                    <input type="text" class="form-control" id="validationCustom01" name="whats_secretario" onkeypress="$(this).mask('(00)00000-0000')">
                    <div class="valid-feedback">
                        Número inválido!
                    </div>
                </div>


                <div class="col-md-5">
                    <label for="validationCustom04" class="form-label">Email Secretario(a)</label>
                    <input type="text" class="form-control" id="validationCustom01" name="email_secretario" placeholder="E-mail Secretário(a)">
                    <div class="valid-feedback">
                        Email inválido!
                    </div>
                </div> 

                <div class="col-md-5">
                    <label for="validationCustom04" class="form-label">Coordenador(a)</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_coordenador" placeholder="Nome do Coordenador">
                    <div class="valid-feedback">
                        Nome inválido!
                    </div>
                </div>

                <div class="col-md-2">
                    <label for="validationCustom03" class="form-label">Whatsapp Coord.</label>
                    <input type="text" class="form-control" id="validationCustom01" name="whats_coordenador" onkeypress="$(this).mask('(00)00000-0000')">
                    <div class="valid-feedback">
                        Número inválido!
                    </div>
                </div>


                <div class="col-md-5">
                    <label for="validationCustom04" class="form-label">Email Coordenador(a)</label>
                    <input type="text" class="form-control" id="validationCustom01" name="email_coordenador" placeholder="E-mail do Coordenador(a)">
                    <label class="exemplo">Ex: joao_bosco@gmail.com</label>
                    <div class="valid-feedback">
                        Email inválido!
                    </div>
            </div> 

                

            <hr>
                <div style="background-color: #c3dfff; text-align: center; height: 2.5em; border-radius: 2em; padding-top: 0.5em;">
                    <h5>Dados Técnicos</h5><br>
                </div>
            
            
                
                <div class="form-check" style="background-color: #d8dfe7; border-radius: 2em; padding-top: 0.5em; padding-bottom: 0.5em;">
                <label for="flexRadioDefault1">Convenio com a SEMEC</label><br>
                    <input class="form-check-input" type="radio" name="convenio_semec" id="flexRadioDefault1"  style="margin-left: 0.5em;" value="Sim">
                    <label class="form-check-label" for="flexRadioDefault1">Sim</label><br>
                    
                    <input class="form-check-input" type="radio" name="convenio_semec" id="flexRadioDefault2"  style="margin-left: 0.5em;" value="Não">
                    <label class="form-check-label" for="flexRadioDefault2">Não</label>
                </div>
                
               
                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label" id="opcao">Nº do Convenio</label>
                    <input type="text" class="form-control" id="opcao" name="n_convenio" placeholder="E-mail">
                </div>

                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label" id="opcao">Objeto</label>
                    <input type="text" class="form-control" id="opcao" name="objeto">
                </div>


                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label" id="opcao">vigencia</label>
                    <input type="date" class="form-control" id="opcao" name="vigencia" placeholder="Vigência">
                </div>
                        
            
            
            

            <hr>

                <div style="background-color: #c3dfff; text-align: center; height: 2.5em; border-radius: 2em; padding-top: 0.5em;">
                <h5>Etapa(s)/Modalidade(s) da Educação Básica Ofertada</h5><br>
                </div>
                
                <div class="form-check" style="background-color: #d8dfe7; border-radius: 2em; padding-top: 0.5em;">
                <label class="form-check-label" for="flexRadioDefault1">Educação Infantil</label><br>
                    <input type="checkbox" name="educacao_infantil" value="Creche">
                    <label for="nursery">Creche</label><br>
                    <input type="checkbox" name="educacao_infantil" value="Pré-Escola">
                    <label for="preSchool">Pré-Escola</label><br>
                    <input type="checkbox" name="educacao_infantil" value="Pré-Escola">
                    <label for="preSchool">Não Ofertante</label><br>
                </div>

                <br>

                <div class="form-check" style="background-color: #d8dfe7; border-radius: 2em; padding-top: 0.5em;">
                <label class="form-check-label" for="flexRadioDefault1">Educação Fundamental</label><br>
                    <input type="checkbox" name="fundamental" value="CF I (1º, 2º e 3º ano)">
                    <label for="cycleOne">CF I (1º, 2º e 3º ano)</label><br>
                    <input type="checkbox" name="fundamental" value="CF II (4º e 5º ano)">
                    <label for="cycleTwo">CF II (4º e 5º ano)</label><br>
                    <input type="checkbox" name="fundamental" value="CF III (6º e 7º ano)">
                    <label for="cycleThree">CF III (6º e 7º ano)</label><br>
                    <input type="checkbox" name="fundamental" value="CF IV (8º e 9º ano)">
                    <label for="cycleFour">CF IV (8º e 9º ano)</label><br>
                    <input type="checkbox" name="fundamental" value="Não Ofertante">
                    <label for="cycleFive">Não Ofertante</label>
                </div>

                <br>
                
                <div class="form-check" style="background-color: #d8dfe7; border-radius: 2em; padding-top: 0.5em;">
                <label class="form-check-label" for="flexRadioDefault1">Ensino Fundamental - Educação de Jovens, Adultos e Idosos (Totalidades do Conhecimento) - Anos Iniciais e Finais</label><br>
                    <input type="checkbox" name="fundamental_eja" value="1ª Totalidade - CF I (1º, 2º e 3º ano)">
                    <label for="totalityOne">1ª Totalidade - CF I (1º, 2º e 3º ano)</label><br>
                    <input type="checkbox" name="fundamental_eja" value="2ª Totalidade - CF II (4º e 5º ano)">
                    <label for="totalityTwo">2ª Totalidade - CF II (4º e 5º ano)</label><br>
                    <input type="checkbox" name="fundamental_eja" value="3ª Totalidade - CF III (6º e 7º ano)">
                    <label for="totalityThree">3ª Totalidade - CF III (6º e 7º ano)</label><br>
                    <input type="checkbox" name="fundamental_eja" value="4ª Totalidade - CF IV (8º e 9º ano)">
                    <label for="totalityFour">4ª Totalidade - CF IV (8º e 9º ano)</label><br>
                    <input type="checkbox" name="fundamental_eja" value="Não Ofertante">
                    <label for="totalityFive">Não Ofertante</label><br>
                </div>

                <div class="form-check" style="background-color: #d8dfe7; border-radius: 2em; padding-top: 0.5em;">
                <label class="form-check-label" for="flexRadioDefault1">Outros</label><br>
                    <input type="checkbox" name="outros_niveis" value="Outros níveis e/ou Modalidades de Ensino Ofertadas">
                    <label for="othersLevels">Outros níveis e/ou Modalidades de Ensino Ofertadas</label><br>
                    <input type="checkbox" name="outros_niveis" value="Não Ofertante">
                    <label for="othersLevels">Não Ofertante</label>
                </div>


            <hr>
            
            <div>
                <button type="submit" class="btn btn-primary" type="button" name="enviar">Enviar</button>
        </form>

            

        

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/painelAdmConfig.js"></script>
    
</body>
</html><?php ob_end_flush(); ?>