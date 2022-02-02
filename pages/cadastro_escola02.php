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
            $fk_tipoInstituicao = $_POST['radioPact'];
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

        <div class="formTechnicalData">
            <hr>
            <h3>Dados Técnicos</h3>
            <hr>

            <form class="formTechnicalDataInput" action="/FORMULARIO.php" method="get">
                
                <p>Celebra Convênio com a Semec</p>
                <input type="radio" name="radioPact" value="no" onclick="handleClickPact(this)">
                <label for="Não">Não</label>
                <input type="radio" name="radioPact" value="yes" onclick="handleClickPact(this)">
                <label for="Sim">Sim</label><br>
                
                <div class="areaPact" style="display: none;">
                    <input type="text" class="allInput noPact" name="n_convenio" placeholder="Nº do Convênio">
                    <input type="text" class="allInput objPact" name="objeto" placeholder="Objeto"><br>
                    <input type="text" class="allInput validityPact" name="vigencia" placeholder="Vigência">
                </div>  

                <p>Etapa(s)/Modalidade(s) da Educação Básica Ofertada</p>
                <p style="font-size: 18px;margin-left: 26px;">Educação Infantil</p>
                <div class="childEducation">
                    <input type="checkbox" name="educacao_basica" value="nursery">
                    <label for="nursery">Creche</label>
                      <input type="checkbox" name="educacao_basica" value="preSchool">
                    <label for="preSchool">Pré-Escola</label>
                </div>

                <p style="font-size: 18px;margin-left: 26px;">Educação Fundamental</p>
                <div class="basicEducation">
                    <input type="checkbox" name="educacao_fundamental" value="cycleOne">
                    <label for="cycleOne">CF I (1º, 2º e 3º ano)</label>
                      <input type="checkbox" name="educacao_fundamental" value="cycleTwp">
                    <label for="cycleTwo">CF II (4º e 5º ano)</label>
                      <input type="checkbox" name="educacao_fundamental" value="cycleThree">
                    <label for="cycleThree">CF III (6º e 7º ano)</label>
                      <input type="checkbox" name="educacao_fundamental" value="cycleFour">
                    <label for="cycleFour">CF IV (8º e 9º ano)</label>
                </div>

                <P style="font-size: 18px; margin-left: 26px;">Ensino Fundamental - Educação de Jovens, Adultos e Idosos (Totalidades do Conhecimento) - Anos Iniciais e Finais</P>
                <div class="basicEducationTwo">
                    <input type="checkbox" name="fundamental_eja" value="totalityOne">
                    <label for="totalityOne">1ª Totalidade - CF I (1º, 2º e 3º ano)</label>
                      <input type="checkbox" name="fundamental_eja" value="totalityTwo">
                    <label for="totalityTwo">2ª Totalidade - CF II (4º e 5º ano)</label><br>
                    <input type="checkbox" name="fundamental_eja" value="totalityThree">
                    <label for="totalityThree">3ª Totalidade - CF III (6º e 7º ano)</label>
                      <input type="checkbox" name="fundamental_eja" value="totalityFour">
                    <label for="totalityFour">4ª Totalidade - CF IV (8º e 9º ano)</label><br>
                    <input type="checkbox" name="fundamental_eja" value="othersLevels">
                    <label for="othersLevels">Outros níveis e/ou Modalidades de Ensino Ofertadas</label>
                </div>
                <br>
                <hr>

                <button type="submit" class="btn btn-primary" type="button" name="enviar">Enviar</button>

            </form>
        </div>

    </div>

    <script src="../js/cadastro_escola.js"></script>
</body>
</html>

