<!DOCTYPE html>
<html lang="pt">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/painelAdmStyle.css">

    <link rel="stylesheet" href="../css/table.css">
     

</head>


            <h1>SISPLAG</h1>
            <h3>Verificação de Cadastro da Escola</h3>


    <?php
        require_once('../config/painel.php');

        $id_instituicao = (!empty($_GET['id_instituicao']) ? $_GET['id_instituicao'] : '');

        $consulta = Conexao::conectar()->prepare("SELECT I.id_instituicao, I.nome_instituicao, T.nome_inst, S.sigla, D.distritoAdm, I.fundacao, I.codigo_inep, I.cnpj_escola, I.entidade_mantenedora, I.cnpj_conselho, I.vigencia_ce, I.cep_escola, I.uf, I.cidade, I.bairro, I.complemento, I.email_inst, I.telefone_inst, I.nome_gestor, I.email_gestor, I.whats_gestor, I.nome_secretario, I.whats_secretario, I.email_secretario, I.nome_coordenador, I.whats_coordenador, I.email_coordenador, I.convenio_semec, I.n_convenio, I.objeto, I.vigencia, I.educacao_infantil, I.fundamental, I.fundamental_eja, I.outros_niveis, I.status_inst 
                                        FROM instituicao I
                                        INNER JOIN  tipoinstituicao T
                                            ON T.id_inst = I.fk_tipoInstituicao
                                        INNER JOIN siglainstituicao S
                                            ON S.id_sigla = I.fk_sigla
                                        INNER JOIN distritoadm D 
                                            ON D.id_distrito=I.fk_distrito
                                        WHERE id_instituicao=$id_instituicao;");
        $consulta->execute();
        $consulta = $consulta->fetchAll();

    ?>

            <?php foreach ($consulta as $consulta) { ?>
                <form>
                <div class="col-md-2">
                    <label for="validationCustom01" class="form-label">Token Escola</label>
                    <input type="text" class="form-control" id="validationCustom01" name="id_instituicao" value="<?php echo $consulta['id_instituicao']; ?>" disabled>
                </div>

                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Tipo Escola</label>
                    <input type="text" class="form-control" id="validationCustom01" name="tipo" value="<?php echo $consulta['nome_inst']; ?>" disabled>
                </div>
                
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Sigla</label>
                    <input type="text" class="form-control" id="validationCustom01" name="sigla" value="<?php echo $consulta['sigla']; ?>" disabled>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Distrito Administrativo</label>
                    <input type="text" class="form-control" id="validationCustom01" name="distrito" value="<?php echo $consulta['distritoAdm']; ?>" disabled>
                </div>
            
                <div class="col-md-8">
                    <label for="validationCustom01" class="form-label">Nome Escola</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_instituicao" value="<?php echo $consulta['nome_instituicao']; ?>" disabled>
                    
                </div>    
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Fundação</label>
                    <input type="date" class="form-control" id="validationCustom01" name="fundacao" value="<?php echo $consulta['fundacao']; ?>" disabled>
                </div>    
                <div class="col-md-3">
                    <label for="validationCustom03" class="form-label">Codigo Inep</label>
                    <input type="text" class="form-control" id="validationCustom01" name="codigo_inep" value="<?php echo $consulta['codigo_inep']; ?>" disabled>
                    
                </div>    
                <div class="col-md-3">
                    <label for="validationCustom03" class="form-label">CNPJ</label>
                    <input type="text" class="form-control" id="validationCustom01" name="cnpj_escola" value="<?php echo $consulta['cnpj_escola']; ?>">
                </div>  

                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Entidade Mantenedora</label>
                    <input type="text" class="form-control" id="validationCustom01" name="entidade_mantenedora" value="<?php echo $consulta['entidade_mantenedora']; ?>" disabled>
                    
                </div> 

                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">CNPJ Conselho</label>
                    <input type="text" class="form-control" id="validationCustom01" name="cnpj_conselho" value="<?php echo $consulta['cnpj_conselho']; ?>" disabled>
                </div>
                

                <div class="col-md-6">
                    <label for="validationCustom05" class="form-label">Vigencia CE</label>
                    <input type="date" class="form-control" id="validationCustom01" name="vigencia_ce" value="<?php echo $consulta['vigencia_ce']; ?>" disabled>
                </div>

                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">CEP</label>
                    <input type="text" class="form-control" id="validationCustom01" name="cep_escola" value="<?php echo $consulta['cep_escola']; ?>" disabled>
                    
                </div>
                
                <div class="col-md-7">
                    <label for="validationCustom01" class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="validationCustom01" name="cidade" value="<?php echo $consulta['cidade']; ?>" disabled>
                    
                </div> 
                
                <div class="col-md-1">
                    <label for="validationCustom01" class="form-label">UF</label>
                    <input type="text" class="form-control" id="validationCustom01" name="uf" value="<?php echo $consulta['uf']; ?>" disabled>
                    
                </div> 
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="validationCustom01" name="complemento" value="<?php echo $consulta['complemento']; ?>" disabled>
                    
                </div>

                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Bairro</label>
                    <input type="text" class="form-control" id="validationCustom01" name="bairro" value="<?php echo $consulta['bairro']; ?>" disabled>
                    
                </div>


                <div class="col-md-5">
                    <label for="validationCustom01" class="form-label">Telefone</label>
                    <input type="text" class="form-control" id="validationCustom01" name="telefone_inst" value="<?php echo $consulta['telefone_inst']; ?>" disabled>
                    
                </div>

                <div class="col-md-5">
                    <label for="validationCustom04" class="form-label">Email</label>
                    <input type="text" class="form-control" id="validationCustom01" name="email_inst" value="<?php echo $consulta['email_inst']; ?>" disabled>
                </div> 
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Diretor</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_gestor" value="<?php echo $consulta['nome_gestor']; ?>" disabled>
                    
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Whatsapp</label>
                    <input type="text" class="form-control" id="validationCustom01" name="whats_gestor" value="<?php echo $consulta['whats_gestor']; ?>" disabled>
                    
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Email</label>
                    <input type="text" class="form-control" id="validationCustom01" name="email_gestor" value="<?php echo $consulta['email_gestor']; ?>" disabled>
                    
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Secretário</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_secretario" value="<?php echo $consulta['nome_secretario']; ?>" disabled>
                    
                </div>

                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Whatsapp</label>
                    <input type="text" class="form-control" id="validationCustom01" name="whats_secretario" value="<?php echo $consulta['whats_secretario']; ?>" disabled>
                    
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Email</label>
                    <input type="text" class="form-control" id="validationCustom01" name="email_secretario" value="<?php echo $consulta['email_secretario']; ?>" disabled>
                    
                </div>

                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Coordenador</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nome_coordenador" value="<?php echo $consulta['nome_coordenador']; ?>" disabled>
                    
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Whatsapp</label>
                    <input type="text" class="form-control" id="validationCustom01" name="whats_coordenador" value="<?php echo $consulta['whats_coordenador']; ?>" disabled>
                    
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Email</label>
                    <input type="text" class="form-control" id="validationCustom01" name="email_coordenador" value="<?php echo $consulta['email_coordenador']; ?>" disabled>
                    
                </div>
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Celebra Convenio SEMEC</label>
                    <input type="text" class="form-control" id="validationCustom01" name="convenio_semec" value="<?php echo $consulta['convenio_semec']; ?>" disabled>
                    
                </div>
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Nº do Convenio</label>
                    <input type="text" class="form-control" id="validationCustom01" name="n_convenio" value="<?php echo $consulta['n_convenio']; ?>" disabled>
                    
                </div>
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Educação Infantil</label>
                    <input type="text" class="form-control" id="validationCustom01" name="educacao_infantil" value="<?php echo $consulta['educacao_infantil']; ?>" disabled>
                    
                </div>
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Educação Fundamental</label>
                    <input type="text" class="form-control" id="validationCustom01" name="fundamental" value="<?php echo $consulta['fundamental']; ?>" disabled>
                    
                </div>
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Educação Fundamental EJA</label>
                    <input type="text" class="form-control" id="validationCustom01" name="fundamental_eja" value="<?php echo $consulta['fundamental_eja']; ?>" disabled>
                    
                </div>

                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Outros</label>
                    <input type="text" class="form-control" id="validationCustom01" name="outros_niveis" value="<?php echo $consulta['outros_niveis']; ?>" disabled>
                    
                </div>
                <?php } ?>

                </form>
               

        </div>

    </div>

</body>
</html>