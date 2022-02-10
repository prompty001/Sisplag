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
</head>

<body id="body-pd">


            <h1>SISPLAG</h1>
    <h2>CADASTRO DE ESCOLA</h2>


    <?php
        include ('../config/conexao.php');

        if(isset($_POST['enviar'])){
            $nome_usuario = $_POST['nome_usuario'];
            $cpf_usuario = $_POST['cpf_usuario'];
            $email_usuario = $_POST['email_usuario'];
            $senha_usuario = $_POST['senha_usuario'];
            $inicio_mandato = $_POST['inicio_mandato'];
            $fim_mandato = $_POST['fim_mandato'];
            $data_nascimento = $_POST['data_nascimento'];
            $fk_cargo = $_POST['fk_cargo'];
            $fk_tipousuario = $_POST['fk_tipousuario'];

            $cadastroUsuario = Conexao::conectar()->prepare("INSERT INTO USUARIO (nome_usuario, cpf_usuario, email_usuario, senha_usuario, inicio_mandato, fim_mandato, data_nascimento, fk_cargo, fk_tipousuario) VALUES ('$nome_usuario', '$cpf_usuario', '$email_usuario', '$senha_usuario', '$inicio_mandato', '$fim_mandato', '$data_nascimento', '$fk_cargo', '$fk_tipousuario')");

            $cadastroUsuario->execute();
            Painel::alert('sucesso',' cadastro realizado com sucesso!');
            header("Location: stand_by.php");
        }

    ?>

    <div class=schoolForm>
        <div class=formPersonalData>
            <hr>
                <h3>Dados de Identificação</h3>
            <hr>
            <!--Cadastro da escola - Dados de identificação | Parte 1/4-->
        <form method="POST" class="row g-3">
        <label class="form-check-label" for="flexRadioDefault1">Tipo de Escola</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" value="1" id="inlineRadio1">
                <label class="form-check-label" for="inlineRadio1">
                    Pública
                </label>
                
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" value="2" id="inlineRadio2">
                <label class="form-check-label" for="inlineRadio2" style="text-decoration: none;">
                    Privada
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
                    <input type="text" class="form-control" id="validationCustom01" name="codigo_inep" required onkeypress="$(this).mask('000.000.000-00')">
                    <label class="exemplo">Ex: 000.111.222-33</label>
                    <div class="valid-feedback">
                        CPF inválido!
                    </div>
                </div>

                <div class="col-md-3">
                    <label for="validationCustom03" class="form-label">CNPJ</label>
                    <input type="text" class="form-control" id="validationCustom01" name="cnpj_escola" required onkeypress="$(this).mask('000.000.000-00')">
                    <label class="exemplo">Ex: 000.111.222-33</label>
                    <div class="valid-feedback">
                        CPF inválido!
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
                    <input type="text" class="form-control" id="validationCustom01" name="cnpj_conselho" required onkeypress="$(this).mask('000.000.000-00')">
                    <label class="exemplo">Ex: 000.111.222-33</label>
                    <div class="valid-feedback">
                        CPF inválido!
                    </div>
                </div>
                
                <div class="col-md-3">
                    <label for="validationCustom02" class="form-label">Vigência CE</label>
                    <input type="date" class="form-control" id="validationCustom01" name="vigencia_ce'" required>
                </div>

                <div class="col-md-2">
                    <label for="validationCustom03" class="form-label">CEP</label>
                    <input type="text" class="form-control" id="validationCustom01" name="cep_escola" required onkeypress="$(this).mask('000.000.000-00')">
                    <label class="exemplo">Ex: 000.111.222-33</label>
                    <div class="valid-feedback">
                        CPF inválido!
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
                    <input type="text" class="form-control" id="validationCustom01" name="telefone_inst" required onkeypress="$(this).mask('000.000.000-00')">
                    <label class="exemplo">Ex: 000.111.222-33</label>
                    <div class="valid-feedback">
                        CPF inválido!
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
                    <input type="text" class="form-control" id="validationCustom01" name="nome_gestor" placeholder="E-mail" required>
                    <label class="exemplo">Ex: joao_bosco@gmail.com</label>
                    <div class="valid-feedback">
                        Email inválido!
                    </div>
                </div>

                <div class="col-md-2">
                    <label for="validationCustom03" class="form-label">Whatsapp Diretor</label>
                    <input type="text" class="form-control" id="validationCustom01" name="whats_gestor" required onkeypress="$(this).mask('000.000.000-00')">
                    <label class="exemplo">Ex: 000.111.222-33</label>
                    <div class="valid-feedback">
                        CPF inválido!
                    </div>
                </div>


                <div class="col-md-5">
                    <label for="validationCustom04" class="form-label">Email Diretor</label>
                    <input type="text" class="form-control" id="validationCustom01" name="email_gestor" placeholder="E-mail" required>
                    <label class="exemplo">Ex: joao_bosco@gmail.com</label>
                    <div class="valid-feedback">
                        Email inválido!
                    </div>
                </div> 

                <div class="col-md-5">
                    <label for="validationCustom04" class="form-label">Secretario(a)</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_secretario" placeholder="E-mail" required>
                    <label class="exemplo">Ex: joao_bosco@gmail.com</label>
                    <div class="valid-feedback">
                        Email inválido!
                    </div>
                </div>

                <div class="col-md-2">
                    <label for="validationCustom03" class="form-label">Whatsapp Secretario</label>
                    <input type="text" class="form-control" id="validationCustom01" name="whats_secretario" required onkeypress="$(this).mask('000.000.000-00')">
                    <label class="exemplo">Ex: 000.111.222-33</label>
                    <div class="valid-feedback">
                        CPF inválido!
                    </div>
                </div>


                <div class="col-md-5">
                    <label for="validationCustom04" class="form-label">Email Gestor</label>
                    <input type="text" class="form-control" id="validationCustom01" name="email_secretario" placeholder="E-mail" required>
                    <label class="exemplo">Ex: joao_bosco@gmail.com</label>
                    <div class="valid-feedback">
                        Email inválido!
                    </div>
                </div> 

                <div class="col-md-5">
                    <label for="validationCustom04" class="form-label">Coordenador(a)</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_coordenador" placeholder="E-mail" required>
                    <label class="exemplo">Ex: joao_bosco@gmail.com</label>
                    <div class="valid-feedback">
                        Email inválido!
                    </div>
                </div>

                <div class="col-md-2">
                    <label for="validationCustom03" class="form-label">Whatsapp Coordenador</label>
                    <input type="text" class="form-control" id="validationCustom01" name="whats_coordenador" required onkeypress="$(this).mask('000.000.000-00')">
                    <label class="exemplo">Ex: 000.111.222-33</label>
                    <div class="valid-feedback">
                        CPF inválido!
                    </div>
                </div>


                <div class="col-md-5">
                    <label for="validationCustom04" class="form-label">Email Coordenador</label>
                    <input type="text" class="form-control" id="validationCustom01" name="email_coordenador" placeholder="E-mail" required>
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
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                    <label class="form-check-label" for="inlineRadio1">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">Não</label>
                </div>

                <div class="col-md-5">
                    <label for="validationCustom04" class="form-label">Nº do Convenio</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_coordenador" placeholder="E-mail" required>
                    <label class="exemplo">Ex: joao_bosco@gmail.com</label>
                    <div class="valid-feedback">
                        Email inválido!
                    </div>
                </div>

                <div class="col-md-2">
                    <label for="validationCustom03" class="form-label">Objeto</label>
                    <input type="text" class="form-control" id="validationCustom01" name="whats_coordenador" required onkeypress="$(this).mask('000.000.000-00')">
                    <label class="exemplo">Ex: 000.111.222-33</label>
                    <div class="valid-feedback">
                        CPF inválido!
                    </div>
                </div>


                <div class="col-md-5">
                    <label for="validationCustom04" class="form-label">vigencia</label>
                    <input type="text" class="form-control" id="validationCustom01" name="email_coordenador" placeholder="E-mail" required>
                    <label class="exemplo">Ex: joao_bosco@gmail.com</label>
                    <div class="valid-feedback">
                        Email inválido!
                    </div>
            </div> 


                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Default checkbox
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        Checked checkbox
                    </label>
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