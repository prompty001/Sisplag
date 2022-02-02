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

    <div class=schoolForm>
        <div class=formPersonalData>
            <hr>
            <h3>Dados de Identificação</h3>
            <hr>
            <!--Cadastro da escola - Dados de identificação | Parte 1/4-->
            <form class="formPersonalDataInput" action="/FORMULARIO.php" method="get">

                <p>Tipo da escola</p>
                <div class="radioSchool">
                    <input type="radio" name="radioTypeSchool" value="public" onclick="handleClickType(this)">
                    <label for="public">Pública</label>
                      <input type="radio" name="radioTypeSchool" value="private" onclick="handleClickType(this)">
                    <label for="public">Privada</label><br>
                </div>

                <select class="allInput selectInitials" name="initials">
                    <option value="sigla">&ltSIGLA&gt</SIGLA></option>
                    <option value="emeif">EMEIF</option>
                    <option value="emef">EMEF</option>
                    <option value="emei">EMEI</option>
                    <option value="uei">UEI</option>
                    <option value="osc">OSC</option>
                </select>

                <select class="allInput selectDistrict" name="district">
                    <option value="distrito">&ltDISTRITO&gt</option>
                    <option value="dabel">DABEL</option>
                    <option value="daben">DABEN</option>
                    <option value="dagua">DAGUA</option>
                    <option  value="daico">DAICO</option>
                    <option value="daout">DAOUT</option>
                    <option value="damos">DAMOS</option>
                    <option value="daent">DAENT</option>
                    <option value="dasac">DASAC</option>
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

        <div class="formTechnicalData">
            <hr>
            <h3>Dados Técnicos</h3>
            <hr>

            <form class="formTechnicalDataInput" action="/FORMULARIO.php" method="get">
                
                <p>Celebra Convênio com a Semec</p>
                <input type="radio" name="radioPact" value="no" onclick="handleClickPact(this)">
                <label for="Não">Não</label>
                <input type="radio" name="radioPact" value="yes" onclick="handleClickPact(this)">
                <label for="Sim">Sim</label><br>
                
                <div class="areaPact" style="display: none;">
                    <input type="text" class="allInput noPact" name="noPact" placeholder="Nº do Convênio">
                    <input type="text" class="allInput objPact" name="objPact" placeholder="Objeto"><br>
                    <input type="text" class="allInput validityPact" name="validityPact" placeholder="Vigência">
                </div>  

                <p>Etapa(s)/Modalidade(s) da Educação Básica Ofertada</p>
                <p style="font-size: 18px;margin-left: 26px;">Educação Infantil</p>
                <div class="childEducation">
                    <input type="checkbox" name="nursery" value="nursery">
                    <label for="nursery">Creche</label>
                      <input type="checkbox" name="preSchool" value="preSchool">
                    <label for="preSchool">Pré-Escola</label>
                </div>

                <p style="font-size: 18px;margin-left: 26px;">Educação Fundamental</p>
                <div class="basicEducation">
                    <input type="checkbox" name="cycleOne" value="cycleOne">
                    <label for="cycleOne">CF I (1º, 2º e 3º ano)</label>
                      <input type="checkbox" name="cycleTwo" value="cycleTwp">
                    <label for="cycleTwo">CF II (4º e 5º ano)</label>
                      <input type="checkbox" name="cycleThree" value="cycleThree">
                    <label for="cycleThree">CF III (6º e 7º ano)</label>
                      <input type="checkbox" name="cycleFour" value="cycleFour">
                    <label for="cycleFour">CF IV (8º e 9º ano)</label>
                </div>

                <P style="font-size: 18px; margin-left: 26px;">Ensino Fundamental - Educação de Jovens, Adultos e Idosos (Totalidades do Conhecimento) - Anos Iniciais e Finais</P>
                <div class="basicEducationTwo">
                    <input type="checkbox" name="totalityOne" value="totalityOne">
                    <label for="totalityOne">1ª Totalidade - CF I (1º, 2º e 3º ano)</label>
                      <input type="checkbox" name="totalityTwo" value="totalityTwo">
                    <label for="totalityTwo">2ª Totalidade - CF II (4º e 5º ano)</label><br>
                    <input type="checkbox" name="totalityThree" value="totalityThree">
                    <label for="totalityThree">3ª Totalidade - CF III (6º e 7º ano)</label>
                      <input type="checkbox" name="totalityFour" value="totalityFour">
                    <label for="totalityFour">4ª Totalidade - CF IV (8º e 9º ano)</label><br>
                    <input type="checkbox" name="othersLevels" value="othersLevels">
                    <label for="othersLevels">Outros níveis e/ou Modalidades de Ensino Ofertadas</label>
                </div>

            </form>
        </div>

        <div class="formBranchData">
            <hr>
            <h3>Filiais</h3>
            <hr>

            <p>Possui Filiais</p>
            <input type="radio" name="radioBranch" value="no" onclick="handleClickBranch(this)">
            <label for="branch">Não</label>
              <input type="radio" name="radioBranch" value="yes" onclick="handleClickBranch(this)">
            <label for="branch">Sim</label><br>
            
            <form class="formBranchDataInput" action="/FORMULARIO.php" method="get">
                <hr>
                <select class="allInput selectInitialsBranch" name="initials">
                    <option value="sigla">&ltSIGLA/TIPO&gt</SIGLA></option>
                    <option value="emeif">EMEIF</option>
                    <option value="emef">EMEF</option>
                    <option value="emei">EMEI</option>
                    <option value="uei">UEI</option>
                    <option value="private">PRIVADA</option>
                </select><br>

                <input type="text" class="allInput instNameBranch" name="instName" placeholder="Nome Institucional">
                <input type="text" class="allInput foundationBranch" name="fundacao" placeholder="Fundação">
                <input type="text" class="allInput inepCodeBranch" name="inepCodeBranch" placeholder="Código INEP">
                <input type="text" class="allInput addressBranch" name="addressBranch" placeholder="Endereço"><br>
                <input type="text" class="allInput cepBranch" name="cepBranch" placeholder="CEP">
                <input type="text" class="allInput phoneBranch" name="phoneBranch" placeholder="Telefone">
                <input type="text" class="allInput instEmailBranch" name="instEmailBranch" placeholder="Email Institucional">
                <input type="text" class="allInput legalResponsible" name="legalResponsible" placeholder="Responsável Legal"><br>
                <input type="text" class="allInput emailLegalResponsible" name="emailLegalResponsible" placeholder="Email Responsável Legal">

                <p>Etapa(s)/Modalidade(s) da Educação Básica Ofertada</p>
                <p style="font-size: 18px;margin-left: 26px;">Educação Infantil</p>
                <div class="childEducationBranch">
                    <input type="checkbox" name="nurseryBranch" value="nurseryBranch">
                    <label for="nurseryBranch">Creche</label>
                      <input type="checkbox" name="preSchoolBranch" value="preSchoolBranch">
                    <label for="preSchoolBranch">Pré-Escola</label>
                </div>

                <p style="font-size: 18px;margin-left: 26px;">Educação Fundamental</p>
                <div class="basicEducationBranch">
                    <input type="checkbox" name="cycleOneBranch" value="cycleOneBranch">
                    <label for="cycleOneBranch">CF I (1º, 2º e 3º ano)</label>
                      <input type="checkbox" name="cycleTwoBranch" value="cycleTwpBranch">
                    <label for="cycleTwoBranch">CF II (4º e 5º ano)</label>
                      <input type="checkbox" name="cycleThreeBranch" value="cycleThreeBranch">
                    <label for="cycleThreeBranch">CF III (6º e 7º ano)</label>
                      <input type="checkbox" name="cycleFourBranch" value="cycleFourBranch">
                    <label for="cycleFourBranch">CF IV (8º e 9º ano)</label>
                </div>

                <P style="font-size: 18px; margin-left: 26px;">Ensino Fundamental - Educação de Jovens, Adultos e Idosos (Totalidades do Conhecimento) - Anos Iniciais e Finais</P>
                <div class="basicEducationTwo">
                    <input type="checkbox" name="totalityOneBranch" value="totalityOneBranch">
                    <label for="totalityOneBranch">1ª Totalidade - CF I (1º, 2º e 3º ano)</label>
                      <input type="checkbox" name="totalityTwoBranch" value="totalityTwoBranch">
                    <label for="totalityTwoBranch">2ª Totalidade - CF II (4º e 5º ano)</label><br>
                    <input type="checkbox" name="totalityThreeBranch" value="totalityThreeBranch">
                    <label for="totalityThreeBranch">3ª Totalidade - CF III (6º e 7º ano)</label>
                      <input type="checkbox" name="totalityFourBranch" value="totalityFourBranch">
                    <label for="totalityFourBranch">4ª Totalidade - CF IV (8º e 9º ano)</label><br>
                    <input type="checkbox" name="othersLevelsBranch" value="othersLevelsBranch">
                    <label for="othersLevelsBranch">Outros níveis e/ou Modalidades de Ensino Ofertadas</label>
                </div>
 
                <button class="sendData" type="submit">Enviar</button>

            </form>

                <button class="addBranch">+ Filial</button><br><br>
                <!--<button class="addBranch" onclick="changeId()">+ Filial</button>-->
        </div>
    </div>

    <script src="../js/cadastro_escola.js"></script>
</body>
</html>

