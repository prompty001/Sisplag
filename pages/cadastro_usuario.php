<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Cadastro | SISPLAG</title>
    <link rel="stylesheet" href="../css/cadastro.css">
  </head>

  <body>
  <h1>SISPLAG</h1>
    <h2>CADASTRO DE USUÁRIOS</h2>


    <?php
        require_once('../config/conexao.php');

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

            $cadastroUsuario = $conn->prepare("INSERT INTO USUARIO (nome_usuario, cpf_usuario, email_usuario, senha_usuario, inicio_mandato, fim_mandato, data_nascimento, fk_cargo, fk_tipousuario) VALUES ('$nome_usuario', '$cpf_usuario', '$email_usuario', '$senha_usuario', '$inicio_mandato', '$fim_mandato', '$data_nascimento', '$fk_cargo', '$fk_tipousuario')");

            $cadastroUsuario->execute();
        }

    ?>

    <div class=schoolForm>
        <div class=formPersonalData>
            <hr>
                <h3>Dados de Identificação</h3>
            <hr>
            <!--Cadastro da escola - Dados de identificação | Parte 1/4-->
            <form method="POST">
                <p class="label">Cargo</p>
                <select id="school-acronym" style="flex-grow: 2" name="fk_cargo">
                        <option value="selecopo" > -- Selecione Opção --</option>
                        <!-- Consulta no banco - Cargos dos Servidores--->
                        <?php
                            $consultaCargo = $conn->prepare('SELECT * FROM cargo');
                            $consultaCargo->execute();
                            $consultaCargo = $consultaCargo->fetchAll();
                            foreach ($consultaCargo as $consultaCargo) {
                            ?>
                                <option value="<?php echo $consultaCargo['id_cargo']; ?>">
                                    <?php echo $consultaCargo['cargo']; ?>
                                </option>
                            <?php } ?>
                        ?>
                    </select>

                    <p class="label">Tipo de Usuario</p>
                <select id="school-acronym" style="flex-grow: 1" name="fk_tipousuario">
                        <option value="selecopo" > -- Selecione Opção --</option>
                        <!-- Consulta no banco - Tipo de Usuario--->
                        <?php
                            $consultaTipoUsuario = $conn->prepare('SELECT * FROM tipousuario');
                            $consultaTipoUsuario->execute();
                            $consultaTipoUsuario = $consultaTipoUsuario->fetchAll();
                            foreach ($consultaTipoUsuario as $consultaTipoUsuario) {
                            ?>
                                <option value="<?php echo $consultaTipoUsuario['id_tipousuario']; ?>">
                                    <?php echo $consultaTipoUsuario['tipoUsuario']; ?>
                                </option>
                            <?php } ?>
                        ?>
                        </select>

                <div>

                <input type="text" class="allInput name" name="nome_usuario" placeholder="Nome do Usuario" required>
                <input type="text" class="allInput foundation" name="data_nascimento" date="dataNascimento" placeholder="Data de nascimento" required ><br>
                <input type="text" class="allInput cnpjSchool" name="cpf_usuario" placeholder="CPF" required><br>

                <div>

                <input type="text" class="allInput maintEntity" name="email_usuario" placeholder="E-mail" required>
                <input type="text" class="allInput cnpjCouncil" name="senha_usuario" placeholder="Senha" required><br>

                <div>

                <input type="text" class="allInput validityCouncil" name="inicio_mandato" date="inicioMandato" placeholder="Início Mandato" required>
                <input type="text" class="allInput validityCouncil" name="fim_mandato" date="fimMandato" placeholder="Fim Mandato" required>

                <div>

                <button type="submit" class="btn btn-primary" type="button" name="enviar">Enviar</button>
                


            </form>

    
  </body>

</html>