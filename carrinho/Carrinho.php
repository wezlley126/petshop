<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Carrinho de compras</title>
    <link rel="stylesheet" href="carrinho.css">
  </head>
  <body>
    <div id="compras">
      <?php
        if (isset($_SESSION['carrinho_not_null'])) {
      ?>
      <div id="titulo_carrinho">Lista de pedidos realizados.</div>
      <table id="tabela_compras" align="center">
        <thead>
            <td>Nome</td>
            <td>Quantidade</td>
            <td>Valor</td>
        </thead>
        <?php
        $total = 0;
        //exibe todos os produtos comprados verificando se eles existem;
          foreach ($_SESSION['lista_de_pedidos'] as $nome => $array) {
            if (isset($_SESSION[$nome])) {
              $total += $_SESSION[$nome]['preço']*$_SESSION[$nome]['quantidade'];
              //escreve todos os produtos em uma tabela de compras.
              ?>
              <tr>
                <td><?php echo $_SESSION[$nome]['nome'] ?></td>
                <td><?php echo $_SESSION[$nome]['quantidade'] ?></td>
                <td><?php echo "R$".$_SESSION[$nome]['preço']*$_SESSION[$nome]['quantidade']."0"?></td>
              </tr>
              <?php
            }
          }
          ?>
            <tr>
                <td colspan="2"><b>Total: </b></td>
                <td><?php echo "R$".$total."0"?></td>
            </tr>

            </table>

          <?php
            ?>
            <a href=""><div id="chorro"><button type="button" name="button" id="button">Confirmar a compra</button><br/>
            <?php
              }else{
                ?>
                <div id="produto_nulo">Nenhum produto foi adicionado ao carrinho no momento.</div>
                <?php
              }
            ?>
    </div>
  </body>
</html>
