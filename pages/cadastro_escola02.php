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

            $nome_filial = $_POST['nome_filial'];
            $possuiFilial = $_POST['possuiFilial'];
            $fk_instituicao = $_POST['fk_instituicao'];
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

            $cadastroEscola = $conn->prepare("INSERT INTO FILIAL (nome_filial, possuiFilial, fk_instituicao,fk_sigla, fundacao_filial, codigo_inepfilial, cep_filial, complemento, telefone_filial, email_filial, resp_filial, email_respLegal, educacao_infantil, fundamental_filial, fundamentaleja_filial, outrosniveis_filial) VALUES ('$nome_filial', '$possuiFilial', '$fk_instituicao', '$fk_sigla', '$fundacao_filial', '$codigo_inepfilial', '$cep_filial', '$complemento', '$telefone_filial', '$email_filial', '$resp_filial', '$email_respLegal', '$educacao_infantil', '$fundamental_filial', '$fundamentaleja_filial', '$outrosniveis_filial')");

            $cadastroEscola->execute();
            
            header("Location: main.php");

        }

    ?>

    <div class=schoolForm>
       

        <div class="formBranchData">
            <hr>
            <h3>Filiais</h3>
            <hr>

 
            
            <form class="formBranchDataInput" method="POST">

                <p>Possui Filiais</p>
                <input type="radio" name="possuiFilial" value="Não" onclick="handleClickBranch(this)">
                <label for="branch">Não</label>
                  <input type="radio" name="possuiFilial" value="Sim" onclick="handleClickBranch(this)">
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
                </select>

                <select class="allInput selectInitialsBranch" name="fk_instituicao">
                <option>-Instituição-</Instituição></option>
                    <!-- Consulta no banco - Instituição--->
                    <?php
                        $consultaInst = $conn->prepare('SELECT * FROM instituicao');
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

                <input type="text" class="allInput instNameBranch" name="nome_filial" placeholder="Nome Institucional">
                <input type="text" class="allInput foundationBranch" name="fundacao_filial" placeholder="Fundação">
                <input type="text" class="allInput inepCodeBranch" name="codigo_inepfilial" placeholder="Código INEP">
                <input type="text" class="allInput addressBranch" name="complemento" placeholder="Endereço"><br>
                <input type="text" class="allInput cepBranch" name="cep_filial" placeholder="CEP">
                <input type="text" class="allInput phoneBranch" name="telefone_filial" placeholder="Telefone">
                <input type="text" class="allInput instEmailBranch" name="email_filial" placeholder="Email Institucional">
                <input type="text" class="allInput legalResponsible" name="resp_filial" placeholder="Responsável Legal"><br>
                <input type="text" class="allInput emailLegalResponsible" name="email_respLegal" placeholder="Email Responsável Legal">

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
                    <input type="checkbox" name="fundamental_filial" value="CF I (1º, 2º e 3º ano)">
                    <label for="cycleOne">CF I (1º, 2º e 3º ano)</label>
                      <input type="checkbox" name="fundamental_filial" value="CF II (4º e 5º ano)">
                    <label for="cycleTwo">CF II (4º e 5º ano)</label>
                      <input type="checkbox" name="fundamental_filial" value="CF III (6º e 7º ano)">
                    <label for="cycleThree">CF III (6º e 7º ano)</label>
                      <input type="checkbox" name="fundamental_filial" value="CF IV (8º e 9º ano)">
                    <label for="cycleFour">CF IV (8º e 9º ano)</label>
                </div>

                <P style="font-size: 18px; margin-left: 26px;">Ensino Fundamental - Educação de Jovens, Adultos e Idosos (Totalidades do Conhecimento) - Anos Iniciais e Finais</P>
                <div class="basicEducationTwo">
                    <input type="checkbox" name="fundamentaleja_filial" value="1ª Totalidade - CF I (1º, 2º e 3º ano)">
                    <label for="totalityOne">1ª Totalidade - CF I (1º, 2º e 3º ano)</label>
                      <input type="checkbox" name="fundamentaleja_filial" value="2ª Totalidade - CF II (4º e 5º ano)">
                    <label for="totalityTwo">2ª Totalidade - CF II (4º e 5º ano)</label><br>
                    <input type="checkbox" name="fundamentaleja_filial" value="3ª Totalidade - CF III (6º e 7º ano)">
                    <label for="totalityThree">3ª Totalidade - CF III (6º e 7º ano)</label>
                      <input type="checkbox" name="fundamentaleja_filial" value="4ª Totalidade - CF IV (8º e 9º ano)">
                    <label for="totalityFour">4ª Totalidade - CF IV (8º e 9º ano)</label><br>
                </div>    
                <div>
                    <input type="checkbox" name="outrosniveis_filial" value="Outros níveis e/ou Modalidades de Ensino Ofertadas">
                    <label for="othersLevels">Outros níveis e/ou Modalidades de Ensino Ofertadas</label>
                </div>
                <br>
                <hr>
 
                <button type="submit" class="btn btn-primary" type="button" name="enviar" >Enviar</button>

                <br>
                <hr>
            </form>

        </div>
    </div>

    <script src="../js/cadastro_escola.js"></script>
</body>
</html>