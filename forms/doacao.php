<?php
    session_start();
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="doe.css">
    <title>Seja Bem-vindo</title>
</head>
<body>
    <div class="login-page">
        <h1>Seja Bem-vindo!</h1>
        Faça uma doação para nos ajudar

        <form action="../php/doacoes.php" method="post">
          <select class="" name="tipo">
            <option value="Dinheiro">Dinheiro(R$)</option>
            <option value="Ração">Ração(Kg)</option>
          </select>
            <input type="number" name="quantidade" id="" placeholder="Digite a quantia" required="true">
            <input type="text" name="nome" id="" placeholder="Nome:">
            <input maxlength="9" type="number" name="cep" placeholder="CEP: " value="">
            <p>Você deseja:</p>
            <div class="icons">
                <div>
                    <a href="../" id="botão_registro"><i class="Cancel"></i><span>Home</span></a>
                </div>
                <div>
                    <button id="enviar">Doar</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
<?php
    @$_SESSION['email'];
    @$_SESSION['senha'];
?>
