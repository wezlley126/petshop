<?php
    //unifica todos os arrays em um só;
    if (!isset($_SESSION['acessorios']) || !isset($_SESSION['cachorros']) || !isset($_SESSION['gatos']) || !isset($_SESSION['passaros'])) {
      header('location: ../index.php');
    }

    $array = array_merge($_SESSION['acessorios'], $_SESSION['cachorros'], $_SESSION['gatos'], $_SESSION['passaros']);
    $_SESSION['lista_de_pedidos'] = $array;
    //verifica se o usuario fez algum pedido e vai realizando etapas para verificar se o
    //produto existe, se existir ele é adicionado ao array $_SESSION['carrinho']
    if (isset($_GET['adicionar']))
      {
        if (!isset($_SESSION['user'])) {
          header('location: ../petshop/contas/logino.php');
        }
        else if(isset($_SESSION['user'])){
        $compra = $_GET['adicionar'];

        if (isset($array[$compra]))
          {

            $_SESSION['compra_realizada'] = true;
            $_SESSION['compra'] = $compra;

            if (isset($_SESSION[$compra]))
              {

                $_SESSION[$compra]['quantidade']++;
                //$_SESSION[$compra]['preço'] = $_SESSION['valor '.$compra] * $_SESSION[$compra]['quantidade'];
                header('location: ../petshop');

              }else
              {

                foreach ($array[$compra] as $imagem => $preço){}
                $_SESSION[$compra] = array("nome" => $compra, "quantidade" => 1, "preço" => $preço);
                //$_SESSION['valor '.$compra] = $preço;
                $_SESSION['carrinho_not_null'] = true;
                header('location: ../petshop');

              }

            }else{

              $_SESSION['erro_compra'] = true;

          }
      }
    }
    echo "<br/>";
    /*foreach ($array as $nome => $array) {
      if (isset($_SESSION[$nome])) {
        print_r($_SESSION[$nome]);
        echo "<br/>";
      }
    }*/
?>
