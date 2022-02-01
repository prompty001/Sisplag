
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

        if(isset($_POST['enviar'])){

            $id_inst = $_POST['id_inst'];
            $id_sigla = $_POST['id_sigla'];
            $id_distrito = $_POST['id_distrito'];
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


            $cadastroEscola = $conn->prepare("INSERT INTO instituicao (fk_tipoInstituicao, sigla, fk_distrito, nome_instituicao, fundacao, codigo_inep, cnpj_escola, entidade_mantenedora, cnpj_conselho, vigencia_ce, cidade, uf, complemento, bairro, cep_escola, telefone_inst, email_inst, nome_gestor, whats_gestor, email_gestor, nome_secretario, whats_secretario, email_secretario, nome_coordenador, whats_coordenador, email_coordenador) VALUES ('$id_inst', '$id_sigla', '$id_distrito', '$nome_instituicao', '$fundacao', '$codigo_inep', '$cnpj_escola', '$entidade_mantenedora', '$cnpj_conselho', '$vigencia_ce', '$cidade', '$uf','$complemento', '$bairro', '$cep_escola', '$telefone_inst', '$email_inst', $nome_gestor', $whats_gestor', $email_gestor', '$nome_secretario', '$whats_secretario', '$email_secretario', '$nome_coordenador', '$whats_coordenador', '$email_coordenador')");

            $cadastroEscola->execute();
        }

    ?>


    <div class=schoolForm>
        <div class=formPersonalData>
            <hr>
            <h3>Dados de Identificação</h3>
            <hr>
            <!--Cadastro da escola - Dados de identificação | Parte 1/4-->
            <form method="POST">

                <select name="id_inst">
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

                <select name="id_sigla">
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

                <select name="id_distrito">
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

                <input type="text" class="allInput name" value="nome_instituicao" name="nome_instituicao" placeholder="Nome da Escola">

                <input type="text" class="allInput foundation" value="fundacao" name="fundacao" placeholder="Fundação"><br>

                <input type="text" class="allInput inepCode" value="codigo_inep" name="codigo_inep" placeholder="Código INEP">

                <input type="text" class="allInput cnpjSchool" value="cnpj_escola" name="cnpj_escola" placeholder="CNPJ"><br>

                <input type="text" class="allInput maintEntity" value="entidade_mantenedora" name="entidade_mantenedora" placeholder="Entidade Mantenedora">

                <input type="text" class="allInput cnpjCouncil" value="cnpj_conselho" name="cnpj_conselho" placeholder="CNPJ/Conselho Escolar"><br>

                <input type="text" class="allInput validityCouncil" value="vigencia_ce" name="vigencia_ce" placeholder="Vigência CE">

                <input type="text" class="allInput city" value="cidade" name="cidade" placeholder="Cidade"><br>

                <input type="text" class="allInput uf" value="uf" name="uf" placeholder="UF"><br>

                <input type="text" class="allInput address" value="complemento" name="complemento" placeholder="Endereço">

                <input type="text" class="allInput neighborhood" value="bairro" name="bairro" placeholder="Bairro"><br>

                <input type="text" class="allInput cep" value="cep_escola" name="cep_escola" placeholder="CEP">

                <input type="text" class="allInput phone" value="telefone_inst" name="telefone_inst" placeholder="Telefone"><br>

                <input type="email" class="allInput emailInst" value="email_inst" name="email_inst" placeholder="Email Institucional"><br>

                <input type="text" class="allInput managerName" value="nome_gestor" name="nome_gestor" placeholder="Diretor(a)">

                <input type="text" class="allInput managerWpp" value="whats_gestor" name="whats_gestor" placeholder="Whatsapp"><br>

                <input type="email" class="allInput email" value="email_gestor" name="email_gestor" placeholder="Email"><br>

                <input type="text" class="allInput secretaryName" value="nome_secretario" name="nome_secretario" placeholder="Secretário(a)">

                <input type="text" class="allInput secretaryWpp" value="whats_secretario" name="whats_secretario"placeholder="Whatsapp"><br>

                <input type="email" class="allInput secretaryEmail" value="email_secretario" name="email_secretario" placeholder="Email"><br>

                <input type="text" class="allInput coordinator" value="nome_coordenador" name="nome_coordenador" placeholder="Coordenador(a)">

                <input type="text" class="allInput coordinatorWpp" value="whats_coordenador" name="whats_coordenador" placeholder="Whatsapp"><br>

                <input type="text" class="allInput coordinatorEmail" value="email_coordenador" name="email_coordenador" placeholder="Email">
                
                <br>
                <button type="submit" class="btn btn-primary" type="button" name="enviar">Enviar</button>
            </form>
    <script src="../js/cadastro_escola.js"></script>
</body>
</html>