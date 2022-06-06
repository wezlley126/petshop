<?php
    session_start();
?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="contatoo.css">
    <link rel="icon" href="icone.png">
    <title>Cadastrar</title>
</head>

<body>

    <div class="create-page">
<?php
    //starta a sessão salvando o email e senha do usuário para ele não ter que fazer login toda vez que entrar no site, somente após encerrar a sessão;

    //declaração das sessões igual uma variavel como String email por exemplo;
    @$_SESSION['email'];
    @$_SESSION['senha'];

    //condição que avisa caso já exista um email igual ao que foi usado no formulario de cadastro;
?>
        <h1>Seja bem-vindo</h1>

        <form action="../php/contato.php" method="GET">
            <input type="text" name="endereco" id="" placeholder="Endereço: ">

            <input type="number" name="cep" placeholder="CEP: " value="">

            <input type="number" name="Número" id="" placeholder="Número: ">

            <input type="text" name="nome" placeholder="Nome: " value="">

            <input type="email" name="email" placeholder="Email" value="">

            <input type="date" name="nascimento" placeholder="Data de Nascimento: " value="">

            <textarea name="mensagem" placeholder="Digite sua Mensagem: " rows="8" cols="80"></textarea>

            <p>Você deseja:</p>
            <div class="icons">
                <div>
                    <a href="../" id="botão_login"><i></i><span>Home</span></a>
                </div>
                <div id="btn">
                    <input id="btnMargin" type="submit" name="enviar" value="Enviar" style="margin: 0px;">
                </div>
            </div>
            <div class="icons">
        </form>
    </div>
</body>
</html>
