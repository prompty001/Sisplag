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


    <style>
        h4 {
            text-align: center;
            font-size: 20px;
            color: black;
        }
    </style>
</head>

<body id="body-pd">


            <h1>SISPLAG</h1>
    <h2>ENVIO DE DOCUMENTOS</h2>


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
            <h4>O SISPLAG solicita o envio dos seguintes documentos por parte das escolas, 
                continuando o ato de Cadastro.<br>Obs.: Se algum estiver faltando, ainda assim 
                enviar todos os outros que estiverem disponíveis.
            </h4>  
            <hr>
            <!--Cadastro da escola - Dados de identificação | Parte 1/4-->
        <form method="POST" class="row g-3">
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Requerimento</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Requerimento Escolar</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Projeto Pedagógico</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Quadro Demonstrativo</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Cronograma de Implantação</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Detelhamento de Implantação e Desenvolvimento</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Declaração de Equipamentos</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Alvará de Funcionamento</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Laudo da Vigilância Sanitária</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Laudo do Corpo de Bombeiro</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Projeto com Promoção e Acessibilidade</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Relatório Detalhado das Condições de Oferta dos Cursos</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Comprovante de Entrega de Censo</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Escolas Anexas no Processo da Escola Matriz</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Relação dos Alunos</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Plano de Cursos</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Termo de Convênio para Prática Profissional</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Requerimento Dirigido à Presidencia do CME</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Comprovante dos Atos Constitutivos</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Comprovante de Inscrição</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Comprovante de Inscrição no Cadastro de Contribuição Municipal</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Certidões de Regularidades Fiscais</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Certidões de Regularidades FGTS</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Demonstração de Patrimônio</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Biblioteca</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Acessibilidade</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Laboratório de Informática</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Sala de Recursos Multifuncionais</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Área Esportiva</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Brinquedoteca</label>
                <input type="file" class="form-control" id="inputGroupFile01">
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