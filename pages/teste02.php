<html><head>
        <style>
        
        .button {
    /* Para posicionar os botões para a mesma posição dos campos de texto */
    padding-left: 90px; /* mesmo tamanho que os elementos do tipo label */
}
button {
    /* Esta margem extra representa aproximadamente o mesmo espaço que o espaço entre as labels e os seus campos de texto*/
    margin-left: .5em;
    display: flex;
}

input:focus, textarea:focus {
    /* Dar um pouco de destaque nos elementos ativos */
    border-color: #000;
}

textarea {
    /* Para alinhar corretamente os campos de texto de várias linhas com sua label*/


    /* Para dar espaço suficiente para digitar algum texto */
    height: 5em;

    /* Para permitir aos usuários redimensionarem qualquer textarea verticalmente. Ele não funciona em todos os browsers */
    
}
input, textarea {
    /* Para certificar-se que todos os campos de texto têm as mesmas configurações de fonte. Por padrão, textareas ter uma fonte monospace*/
    font: 1em sans-serif;
    display: flex;

    /* Para dar o mesmo tamanho a todos os campo de texto */
    width: 300px;
    -moz-box-sizing: border-box;
    box-sizing: border-box;

    /* Para harmonizar o look & feel das bordas nos campos de texto*/
    border: 1px solid #999;
}
label {
    /*Para ter certeza que todas as labels tem o mesmo tamanho e estão propriamente alinhadas */
    
    width: 90px;
    text-align: justify;
}
form div + div {
    margin-top: 1em;
}

form {
    /* Apenas para centralizar o form na página */
    margin: 1em;
    width: 1000px;
    /* Para ver as bordas do formulário */
    padding: 1em;
    border: 1px solid #CCC;
    border-radius: 1em;
}
</style>
        <title>Relatório SISPLAG - Verificação de Cadastro de Escola</title></head>
        <h3> Verificação de Cadastro de Escola</h3>
        </body>
        
        <title>Criar e formatar formulários HTML</title>
<link href="estilo_form.css" rel="stylesheet" type="text/css" />
</head>
<body>


<form action="/pagina-processa-dados-do-form" method="post">
    <div>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="usuario_nome" />
    </div>
    <div>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="usuario_email" />
    </div>
    <div>
        <label for="msg">Mensagem:</label>
        <textarea id="msg" name="usuario_msg"></textarea>
    </div>

    <div class="button">
        <button type="submit">Enviar sua mensagem</button>
    </div>
</form>
        </body></html>