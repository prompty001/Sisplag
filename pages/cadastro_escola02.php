<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastro.css">
    <title>Cadastro | Sisplag</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h1>Sisplag</h1>
    <h2>CADASTRO DE ESCOLA</h2>

    <?php
        require_once('../config/conexao.php');
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
            $cnpencia_ce = $_POST['vigencia_ce'];
            $cidj_conselho = $_POST['cnpj_conselho'];
            $vigade = $_POST['cidade'];
            $uf = $_POST['uf'];
            $complemento = $_POST['complemento'];
            $bairro = $_POST['bairro'];
            $cep_escola = $_POST['cep_escola'];
            $telefone_inst = $_POST['telefone_inst'];
            $email_inst = $_POST['email_inst'];
            $nome_gestor = $_POST['nome_gestor'];

        }

    ?>

    <div class=schoolForm>
       
            
            <form class="formPersonalDataInput" action="/FORMULARIO.php" method="get">
            </form>
            
            <form class="formTechnicalDataInput" action="/FORMULARIO.php" method="get">    
            </form>
       

        <div class="formBranchData">
            <hr>
            <h3>Filiais</h3>
            <hr>

 
            
            <form class="formBranchDataInput" method="POST">

                <p>Possui Filiais</p>
                <input type="radio" name="radioBranch" value="no" onclick="handleClickBranch(this)">
                <label for="branch">Não</label>
                  <input type="radio" name="radioBranch" value="yes" onclick="handleClickBranch(this)">
                <label for="branch">Sim</label><br>


                <hr>
                <select class="allInput selectInitialsBranch" name="fk_sigla">
                <option>-Sigla-</SIGLA></option>
                    <!-- Consulta no banco - Siglas--->
                    <?php
                        $consultaSigla = $conn->prepare('SELECT * FROM siglainstituicao');
                        $consultaSigla->execute();
                        $consultaSigla = $consultaSigla->fetchAll();
                        foreach ($consultaSigla as $consultaSigla) {
                        ?>
                            <option value="<?php echo $consultaSigla['id_sigla']; ?>">
                                <?php echo $consultaSigla['sigla']; ?>
                            </option>
                        <?php } ?>
                    ?>
                </select><br>

                <input type="text" class="allInput instNameBranch" name="instName" placeholder="Nome Institucional">
                <input type="text" class="allInput foundationBranch" name="fundacao" placeholder="Fundação">
                <input type="text" class="allInput inepCodeBranch" name="inepCodeBranch" placeholder="Código INEP">
                <input type="text" class="allInput addressBranch" name="addressBranch" placeholder="Endereço"><br>
                <input type="text" class="allInput cepBranch" name="cepBranch" placeholder="CEP">
                <input type="text" class="allInput phoneBranch" name="phoneBranch" placeholder="Telefone">
                <input type="text" class="allInput instEmailBranch" name="instEmailBranch" placeholder="Email Institucional">
                <input type="text" class="allInput legalResponsible" name="legalResponsible" placeholder="Responsável Legal"><br>
                <input type="text" class="allInput emailLegalResponsible" name="emailLegalResponsible" placeholder="Email Responsável Legal">

                <hr>

                <p>Etapa(s)/Modalidade(s) da Educação Básica Ofertada</p>
                <p style="font-size: 18px;margin-left: 26px;">Educação Infantil</p>
                <div class="childEducation">
                    <input type="checkbox" name="educacao_infantil" value="Creche">
                    <label for="nursery">Creche</label>
                      <input type="checkbox" name="educacao_infantil" value="Pré-Escola">
                    <label for="preSchool">Pré-Escola</label>
                </div>

                <p style="font-size: 18px;margin-left: 26px;">Educação Fundamental</p>
                <div class="basicEducation">
                    <input type="checkbox" name="fundamental" value="CF I (1º, 2º e 3º ano)">
                    <label for="cycleOne">CF I (1º, 2º e 3º ano)</label>
                      <input type="checkbox" name="fundamental" value="CF II (4º e 5º ano)">
                    <label for="cycleTwo">CF II (4º e 5º ano)</label>
                      <input type="checkbox" name="fundamental" value="CF III (6º e 7º ano)">
                    <label for="cycleThree">CF III (6º e 7º ano)</label>
                      <input type="checkbox" name="fundamental" value="CF IV (8º e 9º ano)">
                    <label for="cycleFour">CF IV (8º e 9º ano)</label>
                </div>

                <P style="font-size: 18px; margin-left: 26px;">Ensino Fundamental - Educação de Jovens, Adultos e Idosos (Totalidades do Conhecimento) - Anos Iniciais e Finais</P>
                <div class="basicEducationTwo">
                    <input type="checkbox" name="fundamental_eja" value="1ª Totalidade - CF I (1º, 2º e 3º ano)">
                    <label for="totalityOne">1ª Totalidade - CF I (1º, 2º e 3º ano)</label>
                      <input type="checkbox" name="fundamental_eja" value="2ª Totalidade - CF II (4º e 5º ano)">
                    <label for="totalityTwo">2ª Totalidade - CF II (4º e 5º ano)</label><br>
                    <input type="checkbox" name="fundamental_eja" value="3ª Totalidade - CF III (6º e 7º ano)">
                    <label for="totalityThree">3ª Totalidade - CF III (6º e 7º ano)</label>
                      <input type="checkbox" name="fundamental_eja" value="4ª Totalidade - CF IV (8º e 9º ano)">
                    <label for="totalityFour">4ª Totalidade - CF IV (8º e 9º ano)</label><br>
                </div>    
                <div>
                    <input type="checkbox" name="outros_niveis" value="Outros níveis e/ou Modalidades de Ensino Ofertadas">
                    <label for="othersLevels">Outros níveis e/ou Modalidades de Ensino Ofertadas</label>
                </div>

 
                <button class="sendData" type="submit">Enviar</button>

            </form>

                <button class="addBranch">+ Filial</button><br><br>
                <!--<button class="addBranch" onclick="changeId()">+ Filial</button>-->
        </div>
    </div>

    <script src="../js/cadastro_escola.js"></script>
</body>
</html>