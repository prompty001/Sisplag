<!DOCTYPE html>
<html lang="pt">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/painelAdmStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Cadastro de Escolas</title>
    <script src="../lib/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.css">
    <script src="../lib/mask/script_mask.js" defer></script>
</head>

<body id="body-pd">


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
            header("Location: ../login.php");
        }

    ?>



    <div class=schoolForm>
        <div class=formPersonalData>
            <hr>
                <h3>Dados de Identificação</h3>
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
                    <input type="text" class="form-control" id="validationCustom01" name="entidade_mantenedora" placeholder="Senha do Usuario" required>
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
                    <input type="date" class="form-control" id="validationCustom01" name="vigencia_ce'" required>
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
                    <input type="text" class="form-control" id="validationCustom01" name="cidade" placeholder="Nome do Usuario" required>
                    <div class="valid-feedback">
                        Nome não inserido!
                    </div>
                </div>
                  
    
                <div class="col-md-1">
                    <label for="validationCustom01" class="form-label">UF</label>
                    <input type="text" class="form-control" id="validationCustom01" name="uf" placeholder="UF" required>
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
                    <input type="text" class="form-control" id="validationCustom01" name="nome_secretario" placeholder="Nome do Secretário" required>
                    <div class="valid-feedback">
                        Nome inválido!
                    </div>
                </div>

                <div class="col-md-2">
                    <label for="validationCustom03" class="form-label">Whatsapp Secretario</label>
                    <input type="text" class="form-control" id="validationCustom01" name="whats_secretario" required onkeypress="$(this).mask('(00)00000-0000')">
                    <div class="valid-feedback">
                        Número inválido!
                    </div>
                </div>


                <div class="col-md-5">
                    <label for="validationCustom04" class="form-label">Email Secretario(a)</label>
                    <input type="text" class="form-control" id="validationCustom01" name="email_secretario" placeholder="E-mail Secretário(a)" required>
                    <div class="valid-feedback">
                        Email inválido!
                    </div>
                </div> 

                <div class="col-md-5">
                    <label for="validationCustom04" class="form-label">Coordenador(a)</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_coordenador" placeholder="Nome do Coordenador" required>
                    <div class="valid-feedback">
                        Nome inválido!
                    </div>
                </div>

                <div class="col-md-2">
                    <label for="validationCustom03" class="form-label">Whatsapp Coord.</label>
                    <input type="text" class="form-control" id="validationCustom01" name="whats_coordenador" required onkeypress="$(this).mask('(00)00000-0000')">
                    <div class="valid-feedback">
                        Número inválido!
                    </div>
                </div>


                <div class="col-md-5">
                    <label for="validationCustom04" class="form-label">Email Coordenador(a)</label>
                    <input type="text" class="form-control" id="validationCustom01" name="email_coordenador" placeholder="E-mail do Coordenador(a)" required>
                    <label class="exemplo">Ex: joao_bosco@gmail.com</label>
                    <div class="valid-feedback">
                        Email inválido!
                    </div>
            </div> 

                

            <hr>
                <h3>Dados Técnicos</h3>
            <hr>
                <label class="form-check-label" for="flexRadioDefault1">Convenio com a Semec</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="convenio_semec" id="inlineRadio1" value="Sim">
                    <label class="form-check-label" for="inlineRadio1">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="convenio_semec" id="inlineRadio2" value="Não">
                    <label class="form-check-label" for="inlineRadio2">Não</label>
                </div>

                <div class="col-md-5">
                    <label for="validationCustom04" class="form-label">Nº do Convenio</label>
                    <input type="text" class="form-control" id="validationCustom01" name="n_convenio" placeholder="E-mail" required>
                    <div class="valid-feedback">
                        Número inválido!
                    </div>
                </div>

                <div class="col-md-5">
                    <label for="validationCustom03" class="form-label">Objeto</label>
                    <input type="text" class="form-control" id="validationCustom01" name="objeto" required>
                    <div class="valid-feedback">
                        Campo inválido!
                    </div>
                </div>


                <div class="col-md-2">
                    <label for="validationCustom04" class="form-label">vigencia</label>
                    <input type="date" class="form-control" id="validationCustom01" name="vigencia" placeholder="Vigência" required>
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
                </div>

                <br>

                <div class="form-check">
                <label class="form-check-label" for="flexRadioDefault1">Educação Fundamental</label><br>
                    <input type="checkbox" name="fundamental" value="CF I (1º, 2º e 3º ano)">
                    <label for="cycleOne">CF I (1º, 2º e 3º ano)</label>
                    <input type="checkbox" name="fundamental" value="CF II (4º e 5º ano)">
                    <label for="cycleTwo">CF II (4º e 5º ano)</label>
                    <input type="checkbox" name="fundamental" value="CF III (6º e 7º ano)">
                    <label for="cycleThree">CF III (6º e 7º ano)</label>
                    <input type="checkbox" name="fundamental" value="CF IV (8º e 9º ano)">
                    <label for="cycleFour">CF IV (8º e 9º ano)</label>
                </div>

                <br>
                
                <div class="form-check">
                <label class="form-check-label" for="flexRadioDefault1">Ensino Fundamental - Educação de Jovens, Adultos e Idosos (Totalidades do Conhecimento) - Anos Iniciais e Finais</label><br>
                    <input type="checkbox" name="fundamental_eja" value="1ª Totalidade - CF I (1º, 2º e 3º ano)">
                    <label for="totalityOne">1ª Totalidade - CF I (1º, 2º e 3º ano)</label>
                    <input type="checkbox" name="fundamental_eja" value="2ª Totalidade - CF II (4º e 5º ano)">
                    <label for="totalityTwo">2ª Totalidade - CF II (4º e 5º ano)</label><br>
                    <input type="checkbox" name="fundamental_eja" value="3ª Totalidade - CF III (6º e 7º ano)">
                    <label for="totalityThree">3ª Totalidade - CF III (6º e 7º ano)</label>
                    <input type="checkbox" name="fundamental_eja" value="4ª Totalidade - CF IV (8º e 9º ano)">
                    <label for="totalityFour">4ª Totalidade - CF IV (8º e 9º ano)</label><br>
                </div>

                <div class="form-check">
                <label class="form-check-label" for="flexRadioDefault1">Outros</label><br>
                    <input type="checkbox" name="outros_niveis" value="Outros níveis e/ou Modalidades de Ensino Ofertadas">
                    <label for="othersLevels">Outros níveis e/ou Modalidades de Ensino Ofertadas</label>
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