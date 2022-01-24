<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <title>Cadastro | SISPLAG</title>
</head>
<body>
    <h1>Cadastro de Escolas - SISPLAG</h1>

    <?php
      require_once('../config/conexao.php');
    ?>

    <div class=schoolForm>
        <div class=formPersonalData>
            <h3>Dados de Identificação</h3>
            <!--Cadastro da escola - Dados de identificação | Parte 1/4-->
            <form class="formPersonalDataInput" action="/FORMULARIO.php" method="get">
                
                <p>Tipo da escola:</p>
                    <input type="radio" class="public" name="fav_language" value="public">
                    <label for="public">Pública</label><br>
                    <input type="radio" class="private" name="fav_language" value="private">
                    <label for="public">Privada</label><br>

                <div>
                <select class="allInput selectInitials" name="initials">
                    <option value="sigla">-- SIGLA --</SIGLA></option>
                    <option value="emeif">EMEIF</option>
                    <option value="emef">EMEF</option>
                    <option value="emei">EMEI</option>
                    <option value="uei">UEI</option>
                </select>

                <select class="allInput selectDistrict" name="district">
                    <option value="distrito">--DISTRITO--</option>
                    <!-- Consulta no banco - Cargos dos Servidores--->
                    <?php
                            $consultaDistrito = $conn->prepare('SELECT * FROM distritoadm');
                            $consultaDistrito->execute();
                            $consultaDistrito = $consultaDistrito->fetchAll();
                            foreach ($consultaDistrito as $consultaDistrito) {
                            ?>
                                <option value="<?php echo $consultaDistrito['id_distrito']; ?>">
                                    <?php echo $consultaDistrito['distritoAdm']; ?>
                                </option>
                            <?php } ?>
                        ?>
                </select><br>

                <input type="text" class="allInput name" name="name" placeholder="Nome da Escola">
                <input type="text" class="allInput foundation" name="foundation" placeholder="Fundação"><br>
                <input type="text" class="allInput inepCode" name="inepCode" placeholder="Código INEP">
                <input type="text" class="allInput cnpjSchool" name="cnpjSchool" placeholder="CNPJ"><br>
                <input type="text" class="allInput maintEntity" name="maintEntity" placeholder="Entidade Mantenedora">
                <input type="text" class="allInput cnpjCouncil" name="cnpjCouncil" placeholder="CNPJ/Conselho Escolar"><br>
                <input type="text" class="allInput validityCouncil" name="validityCouncil" placeholder="Vigência CE">
                <input type="text" class="allInput city" name="city" placeholder="Cidade"><br>
                

                <input type="text" class="allInput uf" name="uf" placeholder="UF"><br>
                <input type="text" class="allInput address" name="address" placeholder="Endereço">
                <input type="text" class="allInput neighborhood" name="neighborhood" placeholder="Bairro"><br>
                <input type="text" class="allInput cep" name="cep" placeholder="CEP">
                <input type="text" class="allInput phone" name="phone" placeholder="Telefone"><br>
                <input type="email" class="allInput emailInst" name="emailInst" placeholder="Email Institucional"><br>
                <input type="text" class="allInput managerName" name="managerName" placeholder="Diretor(a)">
                <input type="text" class="allInput managerWpp" name="managerWpp" placeholder="Whatsapp"><br>
                <input type="email" class="allInput email" name="email" placeholder="Email"><br>
                <input type="text" class="allInput secretaryName" name="secretaryName" placeholder="Secretário(a)">
                <input type="text" class="allInput secretaryWpp" name="secretaryWpp"placeholder="Whatsapp"><br>
                <input type="email" class="allInput secretaryEmail" name="secretaryEmail" placeholder="Email"><br>
                <input type="text" class="allInput coordinator" name="coordinator" placeholder="Coordenador(a)">
                <input type="text" class="allInput coordinatorWpp" name="coordinatorWpp" placeholder="Whatsapp"><br>
                <input type="text" class="allInput coordinatorEmail" name="coordinatorEmail" placeholder="Email">

            </form>
        </div>
    </div>
</body>
</html>