<?php
  include ("conect.php");

  $tipo = $_POST['tipo'];
  $quantidade = $_POST['quantidade'];
  $nome = $_POST['nome'];
  $estado = $_POST['estado'];
  $cidade = $_POST['cidade'];

  echo "<br/> $tipo <br/> $quantidade <br/> $nome <br/> $estado <br/> $cidade";
?>
