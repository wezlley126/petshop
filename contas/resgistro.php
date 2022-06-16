<?php
    //starta a sessão salvando o email e senha do usuário para ele não ter que fazer login toda vez que entrar no site, somente após encerrar a sessão;
    session_start();

    //conecta ao banco de dados mysql;
    include("../php/conect.php");

    //variaveis que recebem os valores digitados pelo usuário;
    $nome = mysqli_real_escape_string($conect, $_GET['nome']);
    $email = mysqli_real_escape_string($conect, $_GET['email']);
    $senha =mysqli_real_escape_string($conect, $_GET['senha']);

    //variavél que armazena o comando sql;
    $comando1 = ("SELECT * FROM users WHERE email = '$email'");

    //variavel que executa o comando guardado na variavel anterior, parametros usados: variavel da conexão que se encontra em connect.php e a variavel com o comando sql;
    $query1 = mysqli_query($conect, $comando1);

    //comando que verifica quantas contas existem com o email e a senha digitados;
    $rows = mysqli_num_rows($query1);
    $senhamd5 = md5($senha);
    //se não existir nenhuma linha com o email e senha digitados ele starta a sessão e redireciona para a página principal se ele encontrar avisa que o email já está em uso;
    if ($rows==0 & !empty($nome) & !empty($email) & !empty($senhamd5)) {
        $comando2 = "INSERT INTO users (nome, email, senha) VALUES ('$nome', '$email', '$senhamd5')";
        $query2 = mysqli_query($conect, $comando2);
        $_SESSION['conta_criada'] = true;
        header("location: logino.php");
    }else{
        $_SESSION['conta_existente'] = 1;
        header("location: Cadastro.php");
    }

    //fecha a conexão;
    $close = mysqli_close($conect);

    echo "conta criada com sucesso";


?>
