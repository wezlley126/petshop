<?php
  include ("conect.php");

  $tipo = $_POST['tipo'];
  $quantidade = $_POST['quantidade'];
  $nome = $_POST['nome'];
  $cep = $_POST['cep'];

  $comando = "INSERT INTO doacao VALUES ('$tipo', '$quantidade', '$nome', default, '$cep')";
  $query = mysqli_query($conect, $comando);
  if ($query) {
    echo "FOI TUDO ENVIADO";
  }

  echo "<br/> $tipo <br/> $quantidade <br/> $nome <br/> $cep";
?>

<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      body{
        text-align: center;
      }
    </style>
  </head>
  <body>
    <p>Obrigado <?php echo $nome ?> pela sua doação de
    <?php
      if ($tipo == "Dinheiro") {
        echo "R$ $quantidade.";
      }else{
        echo $quantidade."Kg de ração.";
      }
    ?></p>
    <img src="../imagens/pet.png" alt="">
  </body>
</html>
