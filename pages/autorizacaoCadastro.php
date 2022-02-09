<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/table.css">
    <link rel="stylesheet" href="../css/painelAdmStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    

    <title>Autorização de Cadastro | Sisplag</title></head>
<body>
    <div class="sideNav">
        <div class="logo">
            <img src=../assets/new_sisplag.png>
        </div>
        
        <div class="itemsSideNav">
            <a href="painelAdm.php" class="iconsSideNav"><i class="icons"><img src="https://img.icons8.com/external-kmg-design-glyph-kmg-design/54/000000/external-dashboard-ui-essential-kmg-design-glyph-kmg-design.png" class="dashboardIcons"></i>&nbsp;&nbsp;<span class="teste">Início</span></a>
            <a href="#" class="iconsSideNav"><i class="icons"><img src="https://img.icons8.com/external-vitaliy-gorbachev-fill-vitaly-gorbachev/54/000000/external-profile-blogger-vitaliy-gorbachev-fill-vitaly-gorbachev.png" class="userIcons"></i>&nbsp;&nbsp;<span class="teste">Perfil</span></a>
            <a href="cadastro_usuario.php" class="iconsSideNav"><i class="icons"><img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/54/000000/external-users-cyber-security-kiranshastry-solid-kiranshastry.png" class="userRegIcons"></i>&nbsp;&nbsp;<span class="teste">Cadastro de Usuários</span></a>
            <a href="autorizacaoCadastro.php" class="iconsSideNav"><i class="icons"><img src="https://img.icons8.com/ios-filled/50/000000/approval.png" class="authorizationIcons"></i>&nbsp;&nbsp;<span class="teste">Autorização de Cadastro</span></a>
            <a href="consulta_escola.php" class="iconsSideNav"><i class="icons"><img src="https://img.icons8.com/external-itim2101-fill-itim2101/54/000000/external-school-back-to-school-itim2101-fill-itim2101.png" class="consultationIcons"></i>&nbsp;&nbsp;<span class="teste">Consulta de Escolas/Processos</span></a>
            <a href="#" class="iconsSideNav"><i class="icons"><img src="https://img.icons8.com/external-vitaliy-gorbachev-fill-vitaly-gorbachev/54/000000/external-graph-business-vitaliy-gorbachev-fill-vitaly-gorbachev-1.png" class="tablesIcons"></i>&nbsp;&nbsp;<span class="teste"><span>Tabelas e Gráficos</span></span></a>
            <a href="#" class="iconsSideNav"><i class="icons"><img src="https://img.icons8.com/external-sbts2018-solid-sbts2018/54/000000/external-logout-social-media-sbts2018-solid-sbts2018.png" class="logoutIcons"></i>&nbsp;&nbsp;<span class="teste">Logout</span></a>
            
        </div>
    
    </div>

    <div id="main">
        <div class="head">
            <div class="dashboardButton">
                
                <div class="buttonOne">
                    <span style="font-size: 30px; cursor: pointer; color: black; font-weight: bold;" class="navOne">&#8676;</span> <!--&#9776;-->
                </div>

                <div class="buttonTwo">
                    <span style="font-size: 30px; cursor: pointer; color: black; font-weight: bold;" class="navTwo">&#8677;</span>
                </div>   
                 
            </div>

            <div class="clearfix"></div>

            <h1>SISPLAG</h1>
    <h2>AUTORIZAÇÃO DE CADASTRO</h2>
    

    <?php
        require_once('../config/conexao.php');
        require_once('../config/painel.php');

        $consulta = $conn->prepare("SELECT I.id_instituicao, I.nome_instituicao, T.nome_inst, S.sigla, D.distritoAdm 
                                        FROM instituicao I
                                        INNER JOIN  tipoinstituicao T
                                            ON T.id_inst = I.fk_tipoInstituicao
                                        INNER JOIN siglainstituicao S
                                            ON S.id_sigla = I.fk_sigla
                                        INNER JOIN distritoadm D 
                                            ON D.id_distrito=I.fk_distrito
                                        WHERE status_inst = 'Não'");
        $consulta->execute();
        $consulta = $consulta->fetchAll();

    

    ?>

    <div class=schoolForm>
        
        <hr>
        <input type="text" class="input-search" alt="lista-clientes" placeholder="Buscar nesta lista" />
            <!--Criação da Tabela-->
            <table id="example" class="lista-clientes" style="width:100%">
                <thead>
                    <tr>
                        <th>Ordem</th>
                        <th>Escola</th>
                        <th>Tipo da Escola</th>
                        <th>Sigla da Escola</th>
                        <th>Distrito Adm</th>
                        <th id="verificar" >Verificar Cadastro</th>
                        <th id="confirmar" >Aprovar Transferencia</th>
                    </tr>
                </thead>
                <tbody id="myTable">

                    <?php 
                    $id_instituicao = 0;
                    foreach($consulta as $consulta){
                        $id_instituicao = $consulta['id_instituicao']
                        ?>
                    <tr>
                        <td><?php echo $consulta ['id_instituicao'];?></td>
                        <td><?php echo $consulta ['nome_instituicao'];?></td>
                        <td><?php echo $consulta ['nome_inst'];?></td>
                        <td><?php echo $consulta ['sigla'];?></td>
                        <td><?php echo $consulta ['distritoAdm'];?></td>
                        <?php echo " <td><a href='verificar_cadastro.php?id_instituicao=$id_instituicao'><button type='button' class='btn btn-primary'> Verificar</button></a></td>" ?>
                        <?php echo " <td><a href='aprovar_cadastro.php?id_instituicao=$id_instituicao'><button type='button' class='btn btn-danger'>Aprovar</button></a></td>" ?>
                    </tr>
                    <?php }?>
                </tbody>   
                
                
            </table>    
        
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/painelAdmConfig.js"></script>
    <script type="text/javascript" src="../js/jquery.js"></script>

    <script src="../lib/datatables/js/pdfmake.min.js"></script>
    <script src="../lib/datatables/js/pdfmake_vfs_fonts.js"></script>
    <script src="../lib/datatables/js/buttons.html5.min.js"></script> 
    <script src="../lib/datatables/js/buttons.print.min.js"></script>
</body>


<script>
    $(document).ready(function() {
    $('#example').DataTable( {
    dom: 'Bfrtip',   
    colReorder: true,
        buttons: [
     //      'colvis',
           
               {
                extend: 'pdfHtml5',
                orientation: 'landscape',
            },
               {
                extend: 'csv',
                orientation: 'landscape',
                
            },
             {
                extend: 'print',
                orientation: 'landscape',
            },
              {
                extend: 'copy',
                orientation: 'landscape',
            },
        ], 
      
     "order": [[ 8, "desc" ]],
       responsive: true,
       "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nada encontrado",
            "info": "Mostrando página  _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(filtrado de _MAX_ registros no total )",
           "sSearch": "Pesquisar",
            "oPaginate": {
            "sFirst": "Primeiro",
            "sPrevious": "Anterior",
            "sNext": "Próximo",
            "sLast": "Último"
          }
        },
    } );  
    

      
    
    });

</script>
</html>