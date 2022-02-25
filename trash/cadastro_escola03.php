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
    <h1>SISPLAG</h1>
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
            $cnpj_conselho = $_POST['cnpj_conselho'];
            $vigencia_ce = $_POST['vigencia_ce'];
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


            $cadastroEscola = $conn->prepare("INSERT INTO INSTITUICAO (fk_tipoInstituicao, fk_sigla, fk_distrito, nome_instituicao, fundacao, codigo_inep, cnpj_escola, entidade_mantenedora, cnpj_conselho, vigencia_ce, cep_escola, uf, cidade, bairro, complemento, email_inst, telefone_inst, nome_gestor, email_gestor, whats_gestor, nome_secretario, email_secretario, whats_secretario, nome_coordenador, email_coordenador, whats_coordenador) VALUES ('$fk_tipoInstituicao', '$fk_sigla', '$fk_distrito', '$nome_instituicao', '$fundacao', '$codigo_inep', '$cnpj_escola', '$entidade_mantenedora', '$cnpj_conselho', '$vigencia_ce', '$cep_escola', '$uf',  '$cidade', '$bairro', '$complemento', '$email_inst', '$telefone_inst', '$nome_gestor', '$email_gestor', '$whats_gestor', '$nome_secretario', '$email_secretario', '$whats_secretario', '$nome_coordenador', '$email_coordenador', '$whats_coordenador')");

            $cadastroEscola->execute();
        }

    ?>

    <div class=schoolForm>

        <div class="formBranchData">
            <hr>
            <h3>Filiais</h3>
            <hr>

            <p>Possui Filiais</p>
            <input type="radio" name="radioBranch" value="no" onclick="handleClickBranch(this)">
            <label for="branch">Não</label>
              <input type="radio" name="radioBranch" value="yes" onclick="handleClickBranch(this)">
            <label for="branch">Sim</label><br>
            
            <form class="formBranchDataInput" action="/FORMULARIO.php" method="get">
                <hr>
                <select class="allInput selectInitialsBranch" name="initials">
                    <option value="sigla">&ltSIGLA/TIPO&gt</SIGLA></option>
                    <option value="emeif">EMEIF</option>
                    <option value="emef">EMEF</option>
                    <option value="emei">EMEI</option>
                    <option value="uei">UEI</option>
                    <option value="private">PRIVADA</option>
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

                <p>Etapa(s)/Modalidade(s) da Educação Básica Ofertada</p>
                <p style="font-size: 18px;margin-left: 26px;">Educação Infantil</p>
                <div class="childEducationBranch">
                    <input type="checkbox" name="nurseryBranch" value="nurseryBranch">
                    <label for="nurseryBranch">Creche</label>
                      <input type="checkbox" name="preSchoolBranch" value="preSchoolBranch">
                    <label for="preSchoolBranch">Pré-Escola</label>
                </div>

                <p style="font-size: 18px;margin-left: 26px;">Educação Fundamental</p>
                <div class="basicEducationBranch">
                    <input type="checkbox" name="cycleOneBranch" value="cycleOneBranch">
                    <label for="cycleOneBranch">CF I (1º, 2º e 3º ano)</label>
                      <input type="checkbox" name="cycleTwoBranch" value="cycleTwpBranch">
                    <label for="cycleTwoBranch">CF II (4º e 5º ano)</label>
                      <input type="checkbox" name="cycleThreeBranch" value="cycleThreeBranch">
                    <label for="cycleThreeBranch">CF III (6º e 7º ano)</label>
                      <input type="checkbox" name="cycleFourBranch" value="cycleFourBranch">
                    <label for="cycleFourBranch">CF IV (8º e 9º ano)</label>
                </div>

                <P style="font-size: 18px; margin-left: 26px;">Ensino Fundamental - Educação de Jovens, Adultos e Idosos (Totalidades do Conhecimento) - Anos Iniciais e Finais</P>
                <div class="basicEducationTwo">
                    <input type="checkbox" name="totalityOneBranch" value="totalityOneBranch">
                    <label for="totalityOneBranch">1ª Totalidade - CF I (1º, 2º e 3º ano)</label>
                      <input type="checkbox" name="totalityTwoBranch" value="totalityTwoBranch">
                    <label for="totalityTwoBranch">2ª Totalidade - CF II (4º e 5º ano)</label><br>
                    <input type="checkbox" name="totalityThreeBranch" value="totalityThreeBranch">
                    <label for="totalityThreeBranch">3ª Totalidade - CF III (6º e 7º ano)</label>
                      <input type="checkbox" name="totalityFourBranch" value="totalityFourBranch">
                    <label for="totalityFourBranch">4ª Totalidade - CF IV (8º e 9º ano)</label><br>
                    <input type="checkbox" name="othersLevelsBranch" value="othersLevelsBranch">
                    <label for="othersLevelsBranch">Outros níveis e/ou Modalidades de Ensino Ofertadas</label>
                </div>
                <br>
                <hr>
                <button type="submit" class="btn btn-primary" type="button" name="enviar">Enviar</button>

            </form>

                <button class="addBranch">+ Filial</button><br><br>
                <!--<button class="addBranch" onclick="changeId()">+ Filial</button>-->
        </div>
    </div>

    <script src="../js/cadastro_escola.js"></script>
</body>
</html>

