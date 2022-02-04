<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/painelAdmStyle.css">
     
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">

    <title>Painel Administrativo - Sisplag</title>
</head>
<body>
    
    <div class="sideNav">
        <div class="logo">
            <img src=../assets/new_sisplag.png>
        </div>
        
        <div class="itemsSideNav">
            <a href="painelAdm.php" class="iconsSideNav"><i class="icons"><img src="https://img.icons8.com/external-kmg-design-glyph-kmg-design/54/000000/external-dashboard-ui-essential-kmg-design-glyph-kmg-design.png" class="dashboardIcons"></i>&nbsp;&nbsp;<span class="teste">Início</span></a>
            <a href="#" class="iconsSideNav"><i class="icons"><img src="https://img.icons8.com/external-vitaliy-gorbachev-fill-vitaly-gorbachev/54/000000/external-profile-blogger-vitaliy-gorbachev-fill-vitaly-gorbachev.png" class="userIcons"></i>&nbsp;&nbsp;<span class="teste">Perfil</span></a>
            <a href="cadastro_usuario.php" class="iconsSideNav"><i class="icons"><img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/54/000000/external-users-cyber-security-kiranshastry-solid-kiranshastry.png" class="userRegIcons"></i>&nbsp;&nbsp;<span class="teste">Cadastro de Usuários</span></a>
            <a href="../autorizacao-cadastro/autorizacaoCadastro.html" class="iconsSideNav"><i class="icons"><img src="https://img.icons8.com/ios-filled/50/000000/approval.png" class="authorizationIcons"></i>&nbsp;&nbsp;<span class="teste">Autorização de Cadastro</span></a>
            <a href="#" class="iconsSideNav"><i class="icons"><img src="https://img.icons8.com/external-itim2101-fill-itim2101/54/000000/external-school-back-to-school-itim2101-fill-itim2101.png" class="consultationIcons"></i>&nbsp;&nbsp;<span class="teste">Consulta de Escolas/Processos</span></a>
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

            <h1 class="welcome">Boas vindas ao Sistema de Planejamento e Gestão (Sisplag).</h1>

            <div class="rightNav">
                <div class="box">
                <a href="cadastro_usuario.php" class="iconsSideNav"><p>Cadastro de Usuários<br/><span>20 usuários cadastrados</span></p> </a>
                <a href="cadastro_usuario.php" class="iconsSideNav"><img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/54/000000/external-users-cyber-security-kiranshastry-solid-kiranshastry.png" class="rightNavIcons"> </a>
                </div>
            </div>

            <div class="rightNav">
                <div class="box">
                    <p>Autorização de Cadastro<br/><span>30 escolas aguardando</span></p>
                    <img src="https://img.icons8.com/ios-filled/50/000000/approval.png" class="rightNavIcons">
                </div>
            </div>

            <div class="rightNav">
                <div class="box">
                    <p>Consulta de Escolas/Processos<br/><span>50 escolas cadastradas</span></p>
                    <img src="https://img.icons8.com/external-itim2101-fill-itim2101/54/000000/external-school-back-to-school-itim2101-fill-itim2101.png" class="rightNavIcons">
                </div>
            </div>

            <div class="rightNav">
                <div class="box">
                    <p>Tabelas e Gráficos<br><br></p>
                    <img src="https://img.icons8.com/external-vitaliy-gorbachev-fill-vitaly-gorbachev/54/000000/external-graph-business-vitaliy-gorbachev-fill-vitaly-gorbachev-1.png" class="rightNavIcons">
                </div>
            </div>

            <div class="clearfix"></div>

        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/painelAdmConfig.js"></script>
</body>
</html>