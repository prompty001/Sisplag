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

                        <a href="cadastro_escolaint.php" class="nav_link" id="emprestimo">
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

            $nome_filial = $_POST['nome_filial'];
            $possuiFilial = $_POST['possuiFilial'];
            $fk_instituicao = $_POST['id_instituicao'];
            $fk_sigla = $_POST['fk_sigla'];
            $fundacao_filial = $_POST['fundacao_filial'];
            $codigo_inepfilial = $_POST['codigo_inepfilial'];
            $cep_filial = $_POST['cep_filial'];
            $complemento = $_POST['complemento'];            
            $telefone_filial = $_POST['telefone_filial'];
            $email_filial = $_POST['email_filial'];
            $resp_filial = $_POST['resp_filial'];
            $email_respLegal = $_POST['email_respLegal'];

            $educacao_infantil = $_POST['educacao_infantil'];
            $fundamental_filial = $_POST['fundamental_filial'];
            $fundamentaleja_filial = $_POST['fundamentaleja_filial'];
            $outrosniveis_filial = $_POST['outrosniveis_filial'];

            $cadastroEscola = Conexao::conectar()->prepare("INSERT INTO FILIAL (nome_filial, possuiFilial, fk_instituicao,fk_sigla, fundacao_filial, codigo_inepfilial, cep_filial, complemento, telefone_filial, email_filial, resp_filial, email_respLegal, educacao_infantil, fundamental_filial, fundamentaleja_filial, outrosniveis_filial) VALUES ('$nome_filial', '$possuiFilial', '$fk_instituicao', '$fk_sigla', '$fundacao_filial', '$codigo_inepfilial', '$cep_filial', '$complemento', '$telefone_filial', '$email_filial', '$resp_filial', '$email_respLegal', '$educacao_infantil', '$fundamental_filial', '$fundamentaleja_filial', '$outrosniveis_filial')");
 
            $cadastroEscola->execute();
            Painel::alert('sucesso',' cadastro realizado com sucesso!');
            header("Location: ./main.php");
        }

    ?>

    <div class=schoolForm>
        <div class=formPersonalData>
            <hr>
                <h3>Filiais</h3>
            <hr>
            <!--Cadastro da escola - Dados de identificação | Parte 1/4-->
        <form method="POST" class="row g-3">
        <label class="form-check-label" for="flexRadioDefault1">Possui Filial</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="possuiFilial" value="sim" id="inlineRadio1">
                <label class="label" for="inlineRadio1">
                    Sim
                </label>
                
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="possuiFilial" value="não" id="inlineRadio2">
                <label class="label" for="inlineRadio2" style="text-decoration: none;">
                    Não
                </label>
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
            <label>Instituição</label>
            <select class="form-control" id="school-acronym" style="flex-grow: 1" name="id_instituicao">
                <option>-Instituição-</Instituição></option>
                    <!-- Consulta no banco - Instituição--->
                    <?php
                        $consultaInst = Conexao::conectar()->prepare('SELECT * FROM instituicao');
                        $consultaInst->execute();
                        $consultaInst = $consultaInst->fetchAll();
                        foreach ($consultaInst as $consultaInst) {
                        ?>
                            <option value="<?php echo $consultaInst['id_instituicao']; ?>">
                                <?php echo $consultaInst['nome_instituicao']; ?>
                            </option>
                        <?php } ?>
                    ?>
                </select><br>

            </div>
            <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Nome da Filial</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_filial" placeholder="Nome do Usuario">
                </div>

                <div class="col-md-3">
                    <label for="validationCustom02" class="form-label">Data de Fundação</label>
                    <input type="date" class="form-control" id="validationCustom01" name="fundacao_filial">
                </div>  
                
                <div class="col-md-3">
                    <label for="validationCustom03" class="form-label">Codigo do INEP Filial</label>
                    <input type="text" class="form-control" id="validationCustom01" name="codigo_inepfilial" onkeypress="$(this).mask('00000000')">
                    <label class="exemplo">Ex: 13082175</label>
                    <div class="valid-feedback">
                        Código inválido!
                    </div>
                </div>


                <div class="col-md-2">
                    <label for="validationCustom03" class="form-label">CEP</label>
                    <input type="text" class="form-control" id="validationCustom01" name="cep_filial" onkeypress="$(this).mask('00000.000')">
                    <label class="exemplo">Ex: 66045.823</label>
                    <div class="valid-feedback">
                        CEP inválido!
                    </div>
                </div>


                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="validationCustom01" name="complemento" placeholder="Nome do Usuario">
                    <div class="valid-feedback">
                        Nome não inserido!
                    </div>
                </div>


                <div class="col-md-2">
                    <label for="validationCustom03" class="form-label">Telefone</label>
                    <input type="text" class="form-control" id="validationCustom01" name="telefone_filial" onkeypress="$(this).mask('(00)00000-0000')">
                    <label class="exemplo">Ex: (91)98877-4455</label>
                    <div class="valid-feedback">
                        Número inválido!
                    </div>
                </div>


                <div class="col-md-4">
                    <label for="validationCustom04" class="form-label">Email</label>
                    <input type="text" class="form-control" id="validationCustom01" name="email_filial" placeholder="E-mail">
                    <label class="exemplo">Ex: joao_bosco@gmail.com</label>
                    <div class="valid-feedback">
                        Email inválido!
                    </div>
                </div> 

                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">Responsável Filial(a)</label>
                    <input type="text" class="form-control" id="validationCustom01" name="resp_filial" placeholder="Nome do Diretor(a)">
                    <div class="valid-feedback">
                        Nome inválido!
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">Email Responsável</label>
                    <input type="text" class="form-control" id="validationCustom01" name="email_respLegal" placeholder="Email do Responsável Legal">
                    <label class="exemplo">Ex: joao_bosco@gmail.com</label>
                    <div class="valid-feedback">
                        Email inválido!
                    </div>
                </div>


            <hr>

                <div class="form-check">
                <label>Etapa(s)/Modalidade(s) da Educação Básica Ofertada</label><br>
                <label class="form-check-label" for="flexRadioDefault1">Educação Infantil</label><br>
                    <input type="checkbox" name="educacao_infantil" value="Creche">
                    <label for="nursery">Creche</label>
                    <input type="checkbox" name="educacao_infantil" value="Pré-Escola">
                    <label for="preSchool">Pré-Escola</label>
                    <input type="checkbox" name="educacao_infantil" value="Não há">
                    <label for="preSchool">Não há</label>
                </div>

                <br>

                <div class="form-check">
                <label class="form-check-label" for="flexRadioDefault1">Educação Fundamental</label><br>
                    <input type="checkbox" name="fundamental_filial" value="CF I (1º, 2º e 3º ano)">
                    <label for="cycleOne">CF I (1º, 2º e 3º ano)</label>
                    <input type="checkbox" name="fundamental_filial" value="CF II (4º e 5º ano)">
                    <label for="cycleTwo">CF II (4º e 5º ano)</label>
                    <input type="checkbox" name="fundamental_filial" value="CF III (6º e 7º ano)">
                    <label for="cycleThree">CF III (6º e 7º ano)</label>
                    <input type="checkbox" name="fundamental_filial" value="CF IV (8º e 9º ano)">
                    <label for="cycleFour">CF IV (8º e 9º ano)</label>
                    <input type="checkbox" name="fundamental_filial" value="Não há">
                    <label for="preSchool">Não há</label>
                </div>

                <br>
                
                <div class="form-check">
                <label class="form-check-label" for="flexRadioDefault1">Ensino Fundamental - Educação de Jovens, Adultos e Idosos (Totalidades do Conhecimento) - Anos Iniciais e Finais</label><br>
                    <input type="checkbox" name="fundamentaleja_filial" value="1ª Totalidade - CF I (1º, 2º e 3º ano)">
                    <label for="totalityOne">1ª Totalidade - CF I (1º, 2º e 3º ano)</label>
                    <input type="checkbox" name="fundamentaleja_filial" value="2ª Totalidade - CF II (4º e 5º ano)">
                    <label for="totalityTwo">2ª Totalidade - CF II (4º e 5º ano)</label><br>
                    <input type="checkbox" name="fundamentaleja_filial" value="3ª Totalidade - CF III (6º e 7º ano)">
                    <label for="totalityThree">3ª Totalidade - CF III (6º e 7º ano)</label>
                    <input type="checkbox" name="fundamentaleja_filial" value="4ª Totalidade - CF IV (8º e 9º ano)">
                    <label for="totalityFour">4ª Totalidade - CF IV (8º e 9º ano)</label><br>
                    <input type="checkbox" name="fundamentaleja_filial" value="Não há">
                    <label for="preSchool">Não há</label>
                </div>

                <div class="form-check">
                <label class="form-check-label" for="flexRadioDefault1">Outros</label><br>
                    <input type="checkbox" name="outrosniveis_filial" value="Outros níveis e/ou Modalidades de Ensino Ofertadas">
                    <label for="othersLevels">Outros níveis e/ou Modalidades de Ensino Ofertadas</label>
                    <input type="checkbox" name="outrosniveis_filial" value="Não há">
                    <label for="preSchool">Não há</label>
                </div>


            <hr>
            
            <div>
                <button type="submit" class="btn btn-primary" type="button" name="enviar">Enviar</button>
                
        </form>

            

        

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/painelAdmConfig.js"></script>
</body>
</html>