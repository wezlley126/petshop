<?php
  include ("conect.php");

  $cep = $_POST['cep'];
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $nascimento = $_POST['nascimento'];
  $mensagem = $_POST['mensagem'];

  $comando = "INSERT INTO contato VALUES ('$cep', '$nome', '$email', '$nascimento', '$mensagem', default)";
  $query = mysqli_query($conect, $comando);
?>

<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">

      body{
        text-align: center;
        background-color: #35DC89;
      }

    </style>
  </head>
  <body>
    <?php
    echo "Obrigado $nome";
    if ($query) {
      echo ",sua mensagem foi enviada e será avaliada.";
    }else {
      echo ", mas ocorreu algum erro que não permitiu o envio de sua mensagem, tente novamente mais tarde.";
    }
    ?>
        <img src="../imagens/pet.png">
  </body>
</html>
