<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Cadastro | SISPLAG</title>
    <link rel="stylesheet" href="../css/cadastro.css">
  </head>

  <body>
  <h1>SISPLAG</h1>
    <h2>CADASTRO DE USUÁRIOS</h2>


    <?php
        require_once('../config/conexao.php');
        require_once('../config/painel.php');


        if(isset($_POST['enviar'])){
            $fk_tipoInstituicao = $_POST['fk_tipoInstituicao'];
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
        <div class=formPersonalData>
            <hr>
                <h3>Dados de Identificação</h3>
            <hr>
            <!--Cadastro da escola - Dados de identificação | Parte 1/4-->
            <form method="POST" action="cadastro_escola02.php">
                <p class="label">Cargo</p>
                <select name="fk_tipoInstituicao">
                    <option>Tipo Escola</option>
                    <!-- Consulta no banco - Tipo de Escola--->
                    <?php
                            $consultaTipo = $conn->prepare('SELECT * FROM tipoinstituicao');
                            $consultaTipo->execute();
                            $consultaTipo = $consultaTipo->fetchAll();
                            foreach ($consultaTipo as $consultaTipo) {
                            ?>
                                <option value="<?php echo $consultaTipo['id_inst']; ?>">
                                    <?php echo $consultaTipo['nome_inst']; ?>
                                </option>
                            <?php } ?>
                        ?>
                </select>

                <select name="fk_sigla">
                    <option>Sigla</SIGLA></option>
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

                <select name="fk_distrito">
                    <option >Distrito Adm</option>
                    <!-- Consulta no banco - Distritos ADM--->
                    <?php
                            $consultaCargo = $conn->prepare('SELECT * FROM distritoadm');
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

                <div>

                <input type="text" class="allInput name"  name="nome_instituicao" placeholder="Nome da Escola">

                <input type="text" class="allInput foundation"  name="fundacao" placeholder="Fundação"><br>

                <input type="text" class="allInput inepCode"  name="codigo_inep" placeholder="Código INEP">

                <input type="text" class="allInput cnpjSchool"  name="cnpj_escola" placeholder="CNPJ"><br>

                <input type="text" class="allInput maintEntity"  name="entidade_mantenedora" placeholder="Entidade Mantenedora">

                <input type="text" class="allInput cnpjCouncil"  name="cnpj_conselho" placeholder="CNPJ/Conselho Escolar"><br>

                <input type="text" class="allInput validityCouncil"  name="vigencia_ce" placeholder="Vigência CE">

                <input type="text" class="allInput city"  name="cidade" placeholder="Cidade"><br>

                <input type="text" class="allInput uf"  name="uf" placeholder="UF"><br>

                <input type="text" class="allInput address" name="complemento" placeholder="Endereço">

                <input type="text" class="allInput neighborhood" name="bairro" placeholder="Bairro"><br>

                <input type="text" class="allInput cep" name="cep_escola" placeholder="CEP">

                <input type="text" class="allInput phone"  name="telefone_inst" placeholder="Telefone"><br>

                <input type="email" class="allInput emailInst"  name="email_inst" placeholder="Email Institucional"><br>

                <input type="text" class="allInput managerName"  name="nome_gestor" placeholder="Diretor(a)">

                <input type="text" class="allInput managerWpp"  name="whats_gestor" placeholder="Whatsapp"><br>

                <input type="email" class="allInput email"  name="email_gestor" placeholder="Email"><br>

                <input type="text" class="allInput secretaryName"  name="nome_secretario" placeholder="Secretário(a)">

                <input type="text" class="allInput secretaryWpp"  name="whats_secretario"placeholder="Whatsapp"><br>

                <input type="email" class="allInput secretaryEmail"  name="email_secretario" placeholder="Email"><br>

                <input type="text" class="allInput coordinator"  name="nome_coordenador" placeholder="Coordenador(a)">

                <input type="text" class="allInput coordinatorWpp"  name="whats_coordenador" placeholder="Whatsapp"><br>

                <input type="text" class="allInput coordinatorEmail"  name="email_coordenador" placeholder="Email">


                <div class="formTechnicalData">
            <hr>
            <h3>Dados Técnicos</h3>
            <hr>

                
                <p>Celebra Convênio com a Semec</p>
                <input type="radio" name="radioPact" value="no" onclick="handleClickPact(this)">
                <label for="Não">Não</label>
                <input type="radio" name="radioPact" value="yes" onclick="handleClickPact(this)">
                <label for="Sim">Sim</label><br>
                
                <div class="areaPact" style="display: none;">
                    <input type="text" class="allInput noPact" name="noPact" placeholder="Nº do Convênio">
                    <input type="text" class="allInput objPact" name="objPact" placeholder="Objeto"><br>
                    <input type="text" class="allInput validityPact" name="validityPact" placeholder="Vigência">
                </div>  

                <p>Etapa(s)/Modalidade(s) da Educação Básica Ofertada</p>
                <p style="font-size: 18px;margin-left: 26px;">Educação Infantil</p>
                <div class="childEducation">
                    <input type="checkbox" name="nursery" value="nursery">
                    <label for="nursery">Creche</label>
                      <input type="checkbox" name="preSchool" value="preSchool">
                    <label for="preSchool">Pré-Escola</label>
                </div>

                <p style="font-size: 18px;margin-left: 26px;">Educação Fundamental</p>
                <div class="basicEducation">
                    <input type="checkbox" name="cycleOne" value="cycleOne">
                    <label for="cycleOne">CF I (1º, 2º e 3º ano)</label>
                      <input type="checkbox" name="cycleTwo" value="cycleTwp">
                    <label for="cycleTwo">CF II (4º e 5º ano)</label>
                      <input type="checkbox" name="cycleThree" value="cycleThree">
                    <label for="cycleThree">CF III (6º e 7º ano)</label>
                      <input type="checkbox" name="cycleFour" value="cycleFour">
                    <label for="cycleFour">CF IV (8º e 9º ano)</label>
                </div>

                <P style="font-size: 18px; margin-left: 26px;">Ensino Fundamental - Educação de Jovens, Adultos e Idosos (Totalidades do Conhecimento) - Anos Iniciais e Finais</P>
                <div class="basicEducationTwo">
                    <input type="checkbox" name="totalityOne" value="totalityOne">
                    <label for="totalityOne">1ª Totalidade - CF I (1º, 2º e 3º ano)</label>
                      <input type="checkbox" name="totalityTwo" value="totalityTwo">
                    <label for="totalityTwo">2ª Totalidade - CF II (4º e 5º ano)</label><br>
                    <input type="checkbox" name="totalityThree" value="totalityThree">
                    <label for="totalityThree">3ª Totalidade - CF III (6º e 7º ano)</label>
                      <input type="checkbox" name="totalityFour" value="totalityFour">
                    <label for="totalityFour">4ª Totalidade - CF IV (8º e 9º ano)</label><br>
                    <input type="checkbox" name="othersLevels" value="othersLevels">
                    <label for="othersLevels">Outros níveis e/ou Modalidades de Ensino Ofertadas</label>
                </div>

            </form>
        </div>

                <button type="submit" class="btn btn-primary" type="button" name="enviar">Enviar</button>
                


                            </div>
                            </div>

    <script src="../js/cadastro_escola.js"></script>
    
  </body>

</html>