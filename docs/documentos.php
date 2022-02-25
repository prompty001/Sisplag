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

    ?>
        

    <div class=schoolForm>
        <div class=formPersonalData>
            <hr>
            <h4>O SISPLAG solicita o envio dos seguintes documentos por parte das escolas, 
                continuando o ato de Cadastro.<br>Obs.: Se algum estiver faltando, ainda assim 
                enviar todos os outros que estiverem disponíveis.
            </h4> 

            <button type='button' class='btn btn-dark'> <a href="../index.php" style="text-decoration: none; color: white;"> << Voltar</a></button>
 
            <hr>
            <!--Cadastro da escola - Dados de identificação | Parte 1/4-->
        <form method="POST" class="row g-3" enctype="multipart/form-data" action="">
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Requerimento e Requerimento Escolar</label>
                <a href='requerimento.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>
        
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Requerimento Escolar</label>
                <a href='requerimento_escolar.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Projeto Pedagógico</label>
                <a href='projeto_ped.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Cronograma de Implantação</label>
                <a href='crono_imp.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Quadro Demonstrativo</label>
                <a href='quadro_demo.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Detalhamento de Implantação e Desenvolvimento</label>
                <a href='detalha_impl.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Declaração de Equipamentos</label>
                <a href='declara_equip.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Alvará de Funcionamento</label>
                <a href='alvara_func.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Laudo da Vigilância Sanitária</label>
                <a href='laudo_vs.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Laudo do Corpo de Bombeiro</label>
                <a href='laudo_cb.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Projeto com Promoção e Acessibilidade</label>
                <a href='proj_acess.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Relatório Detalhado das Condições de Oferta dos Cursos</label>
                <a href='relat_curso.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Comprovante de Entrega de Censo</label>
                <a href='comprov_censo.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Escolas Anexas no Processo da Escola Matriz</label>
                <a href='escola_anexada.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Relação dos Alunos</label>
                <a href='relacao_aluno.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Plano de Cursos</label>
                <a href='plano_curso.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Termo de Convênio para Prática Profissional</label>
                <a href='termo_conv.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Requerimento Dirigido à Presidencia do CME</label>
                <a href='req_cme.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Comprovante dos Atos Constitutivos</label>
                <a href='comp_atos.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Comprovante de Inscrição</label>
                <a href='comp_insc.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Comprovante de Inscrição no Cadastro de Contribuição Municipal</label>
                <a href='comp_contmunicipal.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Certidões de Regularidades Fiscais</label>
                <a href='certidao_regulfiscais.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Certidões de Regularidades FGTS</label>
                <a href='certidao_regulfgts.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Demonstração de Patrimônio</label>
                <a href='demo_patr.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Biblioteca</label>
                <a href='bibliot.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Acessibilidade</label>
                <a href='acessibilidade.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Laboratório de Informática</label>
                <a href='lab_info.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Sala de Recursos Multifuncionais</label>
                <a href='recurso_multi.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Área Esportiva</label>
                <a href='area_esportiva.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Brinquedoteca</label>
                <a href='brinquedoteca.php'><button type='button' class='btn btn-info'> Enviar</button></a>
            </div>


            <hr>
            
            <div>
                <button type="submit" class="btn btn-primary" type="button" name="upload">Enviar</button>
        </form>

            

        

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/painelAdmConfig.js"></script>
</body>
</html>