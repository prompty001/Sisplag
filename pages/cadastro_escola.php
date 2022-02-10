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
            
            header("Location: cadastro_escola02.php");
            
        }

       

        


        
        
       
    ?>

    <div class=schoolForm>
        <div class=formPersonalData>
            <hr>
            <h3>Dados de Identificação</h3>
            <hr>
            <!--Cadastro da escola - Dados de identificação | Parte 1/4-->
            <form class="formTechnicalData" method="POST" >

                <p>Tipo da escola</p>
                <div class="radioSchool">
                    <input type="radio" name="radioTypeSchool" value="1" onclick="handleClickType(this)">
                    <label for="public">Pública</label>
                      <input type="radio" name="radioTypeSchool" value="2" onclick="handleClickType(this)">
                    <label for="public">Privada</label><br>
                </div>

                <select class="allInput selectInitials" name="fk_sigla">
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

                <select class="allInput selectDistrict" name="fk_distrito">
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
      

                <!--                        DADOS TÉCNICOS                             -->

                
            <hr>
            <h3>Dados Técnicos</h3>
            <hr>

            
                
                <p>Celebra Convênio com a Semec</p>
                <input type="radio" name="convenio_semec" value="Não" onclick="handleClickPact(this)">
                <label for="Não">Não</label>
                <input type="radio" name="convenio_semec" value="Sim" onclick="handleClickPact(this)">
                <label for="Sim">Sim</label><br>
                
                <div>
                    <input type="text" class="allInput noPact" name="n_convenio" placeholder="Nº do Convênio">
                    <input type="text" class="allInput objPact" name="objeto" placeholder="Objeto">
                    <input type="text" class="allInput validityPact" name="vigencia" placeholder="Vigência">
                    <br>
                    <br>
                </div>  

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

                <br>
                <hr>

                <button type="submit" class="btn btn-primary" type="button" name="enviar" >Enviar</button>

                <br>
                <hr>
        </form>

    </div>

    <script src="../js/cadastro_escola.js"></script>

 </script>

</body>
</html>

