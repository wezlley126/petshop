<?php
  session_start()
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>The Palacy Company</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='index.css'>
    <link rel='icon' href='imagens/logo.jpg'>
</head>
<body style="text-align: center;">
    <div class='navbar'>

        <!-- <img src='Comidas/logo.png' id="logo"> -->
        <a href="#cachorros">Cachorros</a>
        <a href="#gatos">Gatos</a>
        <a href="#passaros">Passáros</a>

        <a href='forms/doacao.php'>Doações</a>
        <a href="forms/contato.php">Contato</a>
        <a href="carrinho/Carrinho.php"><img id="carroça" src="carroça.png" ></a>
        <a href="carrinho/Sair.php">Cancelar compras</a>
        <a href="contas/Sair.php">Deslogar</a>
        </ul>
    </div>
    <section id='cardapio'>
    <div id='Catalogo'>
    <h2 style="margin-top: 20px;">Produtos</h2>
    </div>
    <?php

    $_SESSION['acessorios'] = array(
      "Bacia" => array("imagens/acessorios/bacia.jpg" => 5.30),
      "Mordedor" => array("imagens/acessorios/mordedor.jpg" => 5.40),
      "Caixa de viagem" => array("imagens/acessorios/caixa de viagem.jpg" => 54.20),
      "Cama pet" => array("imagens/acessorios/cama-pet-p-50x55cm-brinde-colchao-pet.jpg" => 15.90),
      "Vasilha" => array("imagens/acessorios/vasilha.jpg" => 13.40),
      "Coleira" => array("imagens/acessorios/coleira_azul.png" => 13.30)
    );
    $_SESSION['cachorros'] = array(
      "Simparic" => array("imagens/cachorros/simparic.png" => 9.30),
      "Endogard" => array("imagens/cachorros/endogard.png" => 12.40),
      "Ração Champ" => array("imagens/cachorros/Ração Champ.png" => 19.90),
      "Ração DG" => array("imagens/cachorros/Ração DG.png" => 8.40),
      "Ração Equilíbrio" => array("imagens/cachorros/Ração Equilíbrio.png" => 33.30),
      "Ração Golden Senior 15kg" => array("imagens/cachorros/Ração Golden Senior 15kg.png" => 27.90)

    );
    $_SESSION['gatos'] = array(
      "Bolinha lã" => array("imagens/gatos/bolinha-la.jpg" => 3.40),
      "Caixa Areia" => array("imagens/gatos/caixa-areia.jpg" => 42.20),
      "Caixa Viagem" => array("imagens/gatos/caixa-viagem.jpg" => 52.10),
      "Escova dupla" => array("imagens/gatos/escova dupla.jpg" => 9.30),
      "Golden Gatos" => array("imagens/gatos/golden-gatos.jpg" => 13.20),
      "Premium Cat" => array("imagens/gatos/premium-cat.jpg" => 14.40)
    );
    $_SESSION['passaros'] = array(
      "Papa para Filhotes" => array("imagens/passaros/papa para filhotes.jpg" => 8.20),
      "Ração Extrusada" => array("imagens/passaros/ração extrusada.jpg" => 12.10),
      "Ração Nutricional" => array("imagens/passaros/ração nutricional.jpg" => 12.10),
      "Suportes de Madeira" => array("imagens/passaros/suportes de madeira.jpg" => 54.40),
      "Alpiste 500G" => array("imagens/passaros/ALPISTE-500GSITE.png" => 7.40),
      "Gaiola de metal Epoxi" => array("imagens/passaros/gaiola-passaros-metal-periquito-canario-agapornis-capela-epoxi-6390.png" => 37.50)
    );
    ?>
    <?php
      include 'carrinho/identificador.php';
      //echo "<br/>$compra";
    ?>
    <?php
      /*if (isset($_SESSION['compra_realizada']) and $_SESSION['compra_realizada'] == true){
        ?>
        <div style="text-align: center; font-size: 20px; color: blue;">
            <?php echo $_SESSION['compra'] ?> foi adicionado ao carrinho de compras.<br/>
            AVISO(Se você atualizar a página será considerado que foi feito o mesmo pedido novamente)
        </div>
        <?php
      }//$_SESSION['compra_realizada'] = false;
      echo "<br/>";*/
      if (!isset($_GET['adicionar'])) {
        ?>
        <div style="text-align: center; font-size: 20px; color: black;">
            <?php
            if ($_SESSION['compra'] != null){
              echo $_SESSION['compra']." foi adicionado ao carrinho de compras.<br/>";
            }
            ?>
        </div>
        <?php
        $_SESSION['compra'] = null;
      }

      if ($_SESSION['erro_compra'] == true){
    ?>
    <div style="color: red; text-align:center; font-size: 30px;">
      Você não pode adicionar alimentos que não existem!
    </div>
  <?php
    $_SESSION['erro_compra'] = false;}
    $_SESSION['erro_compra'] = false;
  ?>
    <section class ='Produtos'>
  <section class='Titulos'>
      <h1>Acessorios</h1>
  </section>
  <section id="acessorios" class='Comidas'>
        <?php
            foreach ($_SESSION['acessorios'] as $nome => $acessorio_produto) {
              foreach ($acessorio_produto as $imagem => $preço) {
                ?>
                <section class='comida'>
                    <img src='<?php echo $imagem ?>'>
                    <p><?php echo $nome ?>
                       <br/>Preço: R$ <?php echo $preço."0" ?>
                       <br><a href='?adicionar=<?php echo $nome ?>' class='botaodecomprar'>Comprar</a></p>
                </section>
                <?php
              }
            }
        ?>
  </section>

    <section id="cachorros" class='titulos'>
        <h1>Cachorros</h1>
    </section>
    <section class='Comidas'>
    <?php
      foreach ($_SESSION['cachorros'] as $nome => $cachorros_produto) {
        foreach ($cachorros_produto as $imagem => $preço) {
          ?>
          <section class='comida'>
              <img src='<?php echo $imagem ?>'>
              <p><?php echo $nome ?>
                <br/>Preço: R$ <?php echo $preço."0" ?>
               <br><a href='?adicionar=<?php echo $nome ?>' class='botaodecomprar'>Comprar</a></p>
             </section>
          <?php
        }
      }
      ?>
    </section>

        <section id="gatos" class='titulos'>
            <h1>Gatos</h1>
        </section>
        <section class='Comidas'>
          <?php
            foreach ($_SESSION['gatos'] as $nome => $gatos_produto) {
              foreach ($gatos_produto as $imagem => $preço) {
                ?>
                <section class='comida'>
                    <img src='<?php echo $imagem ?>'>
                    <p><?php echo $nome ?>
                      <br/>Preço: R$ <?php echo $preço."0" ?>
                     <br><a href='?adicionar=<?php echo $nome ?>' class='botaodecomprar'>Comprar</a></p>
                   </section>
                <?php
              }
            }
            ?>
          </section>

            <section id="passaros" class='titulos'>
                <h1>Passáros</h1>
            </section>
            <section class='Comidas'>
              <?php
                foreach ($_SESSION['passaros'] as $nome => $passaros_produto) {
                  foreach ($passaros_produto as $imagem => $preço) {
                    ?>
                    <section class='comida'>
                        <img src='<?php echo $imagem ?>'>
                        <p><?php echo $nome ?>
                          <br/>Preço: R$ <?php echo $preço."0" ?>
                         <br><a href='?adicionar=<?php echo $nome ?>' class='botaodecomprar'>Comprar</a></p>
                       </section>
                    <?php
                  }
                }
                ?>
</body>
</html>
