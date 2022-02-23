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

        
         if(isset($_FILES['arquivo']) && ($_FILES['arquivo2']) && ($_FILES['arquivo3']) && ($_FILES['arquivo4']) && ($_FILES['arquivo5']) && ($_FILES['arquivo6']) && ($_FILES['arquivo7']) && ($_FILES['arquivo8']) && ($_FILES['arquivo9']) && ($_FILES['arquivo10']) && ($_FILES['arquivo11']) && ($_FILES['arquivo12']) && ($_FILES['arquivo13']) && ($_FILES['arquivo14']) && ($_FILES['arquivo15']) && ($_FILES['arquivo16']) && ($_FILES['arquivo17']) && ($_FILES['arquivo18']) && ($_FILES['arquivo19']) && ($_FILES['arquivo20']) && ($_FILES['arquivo21']) && ($_FILES['arquivo22']) && ($_FILES['arquivo23']) && ($_FILES['arquivo24']) && ($_FILES['arquivo25']) && ($_FILES['arquivo26']) && ($_FILES['arquivo27']) && ($_FILES['arquivo28']) && ($_FILES['arquivo29']) && ($_FILES['arquivo30'])){
             //VERIFICAÇÃO DOS ARQUIVOS ANEXADOS
             //DECLARAÇÃO DOS ARQUIVOS
            $arquivo = $_FILES['arquivo'];
            $arquivo2 = $_FILES['arquivo2'];
            $arquivo3 = $_FILES['arquivo3'];
            $arquivo4 = $_FILES['arquivo4'];
            $arquivo5 = $_FILES['arquivo5'];
            $arquivo6 = $_FILES['arquivo6'];
            $arquivo7 = $_FILES['arquivo7'];
            $arquivo8 = $_FILES['arquivo8'];
            $arquivo9 = $_FILES['arquivo9'];
            $arquivo10 = $_FILES['arquivo10'];
            $arquivo11 = $_FILES['arquivo11'];
            $arquivo12 = $_FILES['arquivo12'];
            $arquivo13 = $_FILES['arquivo13'];
            $arquivo14 = $_FILES['arquivo14'];
            $arquivo15 = $_FILES['arquivo15'];
            $arquivo16 = $_FILES['arquivo16'];
            $arquivo17 = $_FILES['arquivo17'];
            $arquivo18 = $_FILES['arquivo18'];
            $arquivo19 = $_FILES['arquivo19'];
            $arquivo20 = $_FILES['arquivo20'];
            $arquivo21 = $_FILES['arquivo21'];
            $arquivo22 = $_FILES['arquivo22'];
            $arquivo23 = $_FILES['arquivo23'];
            $arquivo24 = $_FILES['arquivo24'];
            $arquivo25 = $_FILES['arquivo25'];
            $arquivo26 = $_FILES['arquivo26'];
            $arquivo27 = $_FILES['arquivo27'];
            $arquivo28 = $_FILES['arquivo28'];
            $arquivo29 = $_FILES['arquivo29'];
            $arquivo30 = $_FILES['arquivo30'];



            //FALHA AO ENVIAR O ARQUIVO
            if($arquivo['error'] || $arquivo2['error'] || $arquivo3['error'] || $arquivo4['error'] || $arquivo5['error'] || $arquivo6['error'] || $arquivo7['error'] || $arquivo8['error'] || $arquivo9['error'] || $arquivo10['error'] || $arquivo11['error'] || $arquivo12['error'] || $arquivo13['error'] || $arquivo14['error'] || $arquivo15['error'] || $arquivo16['error'] || $arquivo17['error'] || $arquivo18['error'] || $arquivo19['error'] || $arquivo20['error'] || $arquivo21['error'] || $arquivo22['error'] || $arquivo23['error'] || $arquivo24['error'] || $arquivo25['error'] || $arquivo26['error'] || $arquivo27['error'] || $arquivo28['error'] || $arquivo29['error'] || $arquivo30['error']){
                die("Falha ao enviar Arquivo");
            }

            //VERIFICANDO O TAMANHO
            if($arquivo['size'] > 3097152 || $arquivo2['size'] > 3097152 || $arquivo3['size'] > 3097152 || $arquivo4['size'] > 3097152 || $arquivo5['size'] > 3097152 || $arquivo6['size'] > 3097152 || $arquivo7['size'] > 3097152 || $arquivo8['size'] > 3097152 || $arquivo9['size'] > 3097152 || $arquivo10['size'] > 3097152 || $arquivo11['size'] > 3097152 || $arquivo12['size'] > 3097152 || $arquivo13['size'] > 3097152 || $arquivo14['size'] > 3097152 || $arquivo15['size'] > 3097152 || $arquivo16['size'] > 3097152 || $arquivo17['size'] > 3097152 || $arquivo18['size'] > 3097152 || $arquivo19['size'] > 3097152 || $arquivo20['size'] > 3097152 || $arquivo21['size'] > 3097152 || $arquivo22['size'] > 3097152 || $arquivo23['size'] > 3097152 || $arquivo24['size'] > 3097152 || $arquivo25['size'] > 3097152 || $arquivo26['size'] > 3097152 || $arquivo27['size'] > 3097152 || $arquivo28['size'] > 3097152 || $arquivo29['size'] > 3097152 || $arquivo30['size']> 3097152){
                 die("Arquivo grande! Max: 3MB");
             }
             //var_dump($_FILES['arquivo']);

             $pasta = "arquivos/";
             $nomeArquivo = $arquivo['name'];
             $novoNome = uniqid();
             $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

             $nomeArquivo2 = $arquivo2['name'];
             $novoNome2 = uniqid();
             $extensao2 = strtolower(pathinfo($nomeArquivo2, PATHINFO_EXTENSION));

             $nomeArquivo3 = $arquivo3['name'];
             $novoNome3 = uniqid();
             $extensao3 = strtolower(pathinfo($nomeArquivo3, PATHINFO_EXTENSION));

             $nomeArquivo4 = $arquivo4['name'];
             $novoNome4 = uniqid();
             $extensao4 = strtolower(pathinfo($nomeArquivo4, PATHINFO_EXTENSION));

             $nomeArquivo5 = $arquivo5['name'];
             $novoNome5 = uniqid();
             $extensao5 = strtolower(pathinfo($nomeArquivo5, PATHINFO_EXTENSION));

             $nomeArquivo6 = $arquivo6['name'];
             $novoNome6 = uniqid();
             $extensao6 = strtolower(pathinfo($nomeArquivo6, PATHINFO_EXTENSION));

             $nomeArquivo7 = $arquivo7['name'];
             $novoNome7 = uniqid();
             $extensao7 = strtolower(pathinfo($nomeArquivo7, PATHINFO_EXTENSION));

             $nomeArquivo8 = $arquivo8['name'];
             $novoNome8 = uniqid();
             $extensao8 = strtolower(pathinfo($nomeArquivo8, PATHINFO_EXTENSION));

             $nomeArquivo9 = $arquivo9['name'];
             $novoNome9 = uniqid();
             $extensao9 = strtolower(pathinfo($nomeArquivo9, PATHINFO_EXTENSION));

             $nomeArquivo10 = $arquivo10['name'];
             $novoNome10 = uniqid();
             $extensao10 = strtolower(pathinfo($nomeArquivo10, PATHINFO_EXTENSION));

             $nomeArquivo11 = $arquivo11['name'];
             $novoNome11 = uniqid();
             $extensao11 = strtolower(pathinfo($nomeArquivo11, PATHINFO_EXTENSION));

             $nomeArquivo12 = $arquivo12['name'];
             $novoNome12 = uniqid();
             $extensao12 = strtolower(pathinfo($nomeArquivo12, PATHINFO_EXTENSION));

             $nomeArquivo13 = $arquivo13['name'];
             $novoNome13 = uniqid();
             $extensao13 = strtolower(pathinfo($nomeArquivo13, PATHINFO_EXTENSION));

             $nomeArquivo14 = $arquivo14['name'];
             $novoNome14 = uniqid();
             $extensao14 = strtolower(pathinfo($nomeArquivo14, PATHINFO_EXTENSION));

             $nomeArquivo15 = $arquivo15['name'];
             $novoNome15 = uniqid();
             $extensao15 = strtolower(pathinfo($nomeArquivo15, PATHINFO_EXTENSION));

             $nomeArquivo16 = $arquivo16['name'];
             $novoNome16 = uniqid();
             $extensao16 = strtolower(pathinfo($nomeArquivo16, PATHINFO_EXTENSION));

             $nomeArquivo17 = $arquivo17['name'];
             $novoNome17 = uniqid();
             $extensao17 = strtolower(pathinfo($nomeArquivo17, PATHINFO_EXTENSION));

             $nomeArquivo18 = $arquivo18['name'];
             $novoNome18 = uniqid();
             $extensao18 = strtolower(pathinfo($nomeArquivo18, PATHINFO_EXTENSION));

             $nomeArquivo19 = $arquivo19['name'];
             $novoNome19 = uniqid();
             $extensao19 = strtolower(pathinfo($nomeArquivo19, PATHINFO_EXTENSION));

             $nomeArquivo20 = $arquivo20['name'];
             $novoNome20 = uniqid();
             $extensao20 = strtolower(pathinfo($nomeArquivo20, PATHINFO_EXTENSION));

             $nomeArquivo21 = $arquivo21['name'];
             $novoNome21 = uniqid();
             $extensao21 = strtolower(pathinfo($nomeArquivo21, PATHINFO_EXTENSION));

             $nomeArquivo22 = $arquivo22['name'];
             $novoNome22 = uniqid();
             $extensao22 = strtolower(pathinfo($nomeArquivo22, PATHINFO_EXTENSION));
             
             $nomeArquivo23 = $arquivo23['name'];
             $novoNome23 = uniqid();
             $extensao23 = strtolower(pathinfo($nomeArquivo23, PATHINFO_EXTENSION));

             $nomeArquivo24 = $arquivo24['name'];
             $novoNome24 = uniqid();
             $extensao24 = strtolower(pathinfo($nomeArquivo24, PATHINFO_EXTENSION));

             $nomeArquivo25 = $arquivo25['name'];
             $novoNome25 = uniqid();
             $extensao25 = strtolower(pathinfo($nomeArquivo25, PATHINFO_EXTENSION));

             $nomeArquivo26 = $arquivo26['name'];
             $novoNome26 = uniqid();
             $extensao26 = strtolower(pathinfo($nomeArquivo26, PATHINFO_EXTENSION));

             $nomeArquivo27 = $arquivo27['name'];
             $novoNome27 = uniqid();
             $extensao27 = strtolower(pathinfo($nomeArquivo27, PATHINFO_EXTENSION));

             $nomeArquivo28 = $arquivo28['name'];
             $novoNome28 = uniqid();
             $extensao28 = strtolower(pathinfo($nomeArquivo28, PATHINFO_EXTENSION));

             $nomeArquivo29 = $arquivo29['name'];
             $novoNome29 = uniqid();
             $extensao29 = strtolower(pathinfo($nomeArquivo29, PATHINFO_EXTENSION));

             $nomeArquivo30 = $arquivo30['name'];
             $novoNome30 = uniqid();
             $extensao30 = strtolower(pathinfo($nomeArquivo30, PATHINFO_EXTENSION));

            

             if($extensao != "pdf" || $extensao2 != "pdf" || $extensao3 != "pdf" || $extensao4 != "pdf" || $extensao5 != "pdf" || $extensao6 != "pdf" || $extensao7 != "pdf" || $extensao8 != "pdf" || $extensao9 != "pdf" || $extensao10 != "pdf" || $extensao11 != "pdf" || $extensao12 != "pdf" || $extensao13 != "pdf" || $extensao14 != "pdf" || $extensao15 != "pdf" || $extensao16 != "pdf" || $extensao17 != "pdf" || $extensao18 != "pdf" || $extensao19 != "pdf" || $extensao20 != "pdf" || $extensao21 != "pdf" || $extensao22 != "pdf" || $extensao23 != "pdf" || $extensao24 != "pdf" || $extensao25 != "pdf" || $extensao26 != "pdf" || $extensao27 != "pdf" || $extensao28 != "pdf" || $extensao29 != "pdf" || $extensao30 != "pdf"){
                 die ("Arquivo nao aceito");
             }

             $path = $pasta . $novoNome.".".$extensao;
             $certo = move_uploaded_file($arquivo["tmp_name"], $path);

             $path2 = $pasta . $novoNome2.".".$extensao2;
             $certo2 = move_uploaded_file($arquivo2["tmp_name"], $path2);

             $path3 = $pasta . $novoNome3.".".$extensao3;
             $certo3 = move_uploaded_file($arquivo3["tmp_name"], $path3);

             $path4 = $pasta . $novoNome4.".".$extensao4;
             $certo4 = move_uploaded_file($arquivo4["tmp_name"], $path4);

             $path5 = $pasta . $novoNome5.".".$extensao5;
             $certo5 = move_uploaded_file($arquivo5["tmp_name"], $path5);

             $path6 = $pasta . $novoNome6.".".$extensao6;
             $certo6 = move_uploaded_file($arquivo6["tmp_name"], $path6);

             $path7 = $pasta . $novoNome7.".".$extensao7;
             $certo7 = move_uploaded_file($arquivo7["tmp_name"], $path7);

             $path8 = $pasta . $novoNome8.".".$extensao8;
             $certo8 = move_uploaded_file($arquivo8["tmp_name"], $path8);

             $path9 = $pasta . $novoNome9.".".$extensao9;
             $certo9 = move_uploaded_file($arquivo9["tmp_name"], $path9);

             $path10 = $pasta . $novoNome10.".".$extensao10;
             $certo10 = move_uploaded_file($arquivo10["tmp_name"], $path10);

             $pat11 = $pasta . $novoNom11.".".$extensa11;
             $cert11 = move_uploaded_file($arquiv11["tmp_name"], $pat11);

             $path12 = $pasta . $novoNome12.".".$extensao12;
             $certo12 = move_uploaded_file($arquivo12["tmp_name"], $path12);

             $path13 = $pasta . $novoNome13.".".$extensao13;
             $certo13 = move_uploaded_file($arquivo13["tmp_name"], $path13);

             $path14 = $pasta . $novoNome14.".".$extensao14;
             $certo14 = move_uploaded_file($arquivo14["tmp_name"], $path14);

             $path15 = $pasta . $novoNome15.".".$extensao15;
             $certo15 = move_uploaded_file($arquivo15["tmp_name"], $path15);

             $path16 = $pasta . $novoNome16.".".$extensao16;
             $certo16 = move_uploaded_file($arquivo16["tmp_name"], $path16);

             $path17 = $pasta . $novoNome17.".".$extensao17;
             $certo17 = move_uploaded_file($arquivo17["tmp_name"], $path17);

             $path18 = $pasta . $novoNome18.".".$extensao18;
             $certo18 = move_uploaded_file($arquivo18["tmp_name"], $path18);

             $path19 = $pasta . $novoNome19.".".$extensao19;
             $certo19 = move_uploaded_file($arquivo19["tmp_name"], $path19);

             $path20 = $pasta . $novoNome20.".".$extensao20;
             $certo20 = move_uploaded_file($arquivo20["tmp_name"], $path20);

             $path21 = $pasta . $novoNome21.".".$extensao21;
             $certo21 = move_uploaded_file($arquivo21["tmp_name"], $path21);

             $path22 = $pasta . $novoNome22.".".$extensao22;
             $certo22 = move_uploaded_file($arquivo22["tmp_name"], $path22);

             $path23 = $pasta . $novoNome23.".".$extensao23;
             $certo23 = move_uploaded_file($arquivo23["tmp_name"], $path23);

             $path24 = $pasta . $novoNome24.".".$extensao24;
             $certo24 = move_uploaded_file($arquivo24["tmp_name"], $path24);

             $path25 = $pasta . $novoNome25.".".$extensao25;
             $certo25 = move_uploaded_file($arquivo25["tmp_name"], $path25);

             $path26 = $pasta . $novoNome26.".".$extensao26;
             $certo26 = move_uploaded_file($arquivo26["tmp_name"], $path26);

             $path27 = $pasta . $novoNome27.".".$extensao27;
             $certo27 = move_uploaded_file($arquivo27["tmp_name"], $path27);

             $path28 = $pasta . $novoNome28.".".$extensao28;
             $certo28 = move_uploaded_file($arquivo28["tmp_name"], $path28);

             $path29 = $pasta . $novoNome29.".".$extensao29;
             $certo29 = move_uploaded_file($arquivo29["tmp_name"], $path29);

             $path30 = $pasta . $novoNome30.".".$extensao30;
             $certo30 = move_uploaded_file($arquivo30["tmp_name"], $path30);

            if($certo){
                $inseriDoc = Conexao::conectar()->prepare("INSERT INTO documento (requerimento, req_escola, proj_ped, quadro_demo, corno_impl, detalha_impl, declara_equip, alvara_func, laudo_vs, laudo_cb, proj_acess, relat_curso, comprov_censo, escola_anexada, relacao_aluno, plano_curso, termo_conv, req_cme, comp_atos, comp_insc, comp_contmunicipal, certidao_regulfiscais, certtidao_regulfgts, demo_patr, bibliot, acessibilidade, lab_info, recurso_multi, area_esportiva, brinquedoteca) VALUES ('$path', '$path2' , '$path3' , '$path4' , '$path5' , '$path6' , '$path7' , '$path8' , '$path9' , '$path10' , '$path11' , '$path12' , '$path13' , '$path14' , '$path15' , '$path16' , '$path17' , '$path18' , '$path19' , '$path20' , '$path21' , '$path22' , '$path23' , '$path24' , '$path25' , '$path26' , '$path27' , '$path28' , '$path29' , '$path30')");
                $inseriDoc->execute();

                echo "<p>Envio sucesso. </p>";
            }else{
                echo "<p>Falha ao enviar! </p>";
            }
        }

        $selectDoc = Conexao::conectar()->prepare("SELECT * FROM documento");
        $selectDoc->execute();

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
        <form method="POST" class="row g-3" enctype="multipart/form-data" action="">
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Requerimento</label>
                <input name="arquivo" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Requerimento Escolar</label>
                <input name="arquivo2" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Projeto Pedagógico</label>
                <input name="arquivo3" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Quadro Demonstrativo</label>
                <input name="arquivo4" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Cronograma de Implantação</label>
                <input name="arquivo5" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Detelhamento de Implantação e Desenvolvimento</label>
                <input name="arquivo6" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Declaração de Equipamentos</label>
                <input name="arquivo7" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Alvará de Funcionamento</label>
                <input name="arquivo8" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Laudo da Vigilância Sanitária</label>
                <input name="arquivo9" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Laudo do Corpo de Bombeiro</label>
                <input name="arquivo10" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Projeto com Promoção e Acessibilidade</label>
                <input name="arquivo11" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Relatório Detalhado das Condições de Oferta dos Cursos</label>
                <input name="arquivo12" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Comprovante de Entrega de Censo</label>
                <input  name="arquivo13" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Escolas Anexas no Processo da Escola Matriz</label>
                <input name="arquivo14" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Relação dos Alunos</label>
                <input name="arquivo15" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Plano de Cursos</label>
                <input name="arquivo16" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Termo de Convênio para Prática Profissional</label>
                <input name="arquivo17" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Requerimento Dirigido à Presidencia do CME</label>
                <input name="arquivo18" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Comprovante dos Atos Constitutivos</label>
                <input name="arquivo19" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Comprovante de Inscrição</label>
                <input name="arquivo20" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Comprovante de Inscrição no Cadastro de Contribuição Municipal</label>
                <input name="arquivo21" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Certidões de Regularidades Fiscais</label>
                <input name="arquivo22" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Certidões de Regularidades FGTS</label>
                <input name="arquivo23" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Demonstração de Patrimônio</label>
                <input name="arquivo24" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Biblioteca</label>
                <input name="arquivo25" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Acessibilidade</label>
                <input name="arquivo26" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Laboratório de Informática</label>
                <input name="arquivo27" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Sala de Recursos Multifuncionais</label>
                <input name="arquivo28" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Área Esportiva</label>
                <input name="arquivo29" type="file" class="form-control" id="inputGroupFile01">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Brinquedoteca</label>
                <input name="arquivo30" type="file" class="form-control" id="inputGroupFile01">
            </div>


            <hr>
            
            <div>
                <button type="submit" class="btn btn-primary" type="button" name="arquivo">Enviar</button>
        </form>

            

        

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/painelAdmConfig.js"></script>
</body>
</html>