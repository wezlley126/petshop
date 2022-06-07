<?php
  session_start()
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>The Palacy Company</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <link rel='icon' href='imagens/logo.jpg'>
    <script type="text/javascript">
       source=""
    </script>
</head>
<body style="text-align: center;">
    <div class='navbar'>

        <!-- <img src='Comidas/logo.png' id="logo"> -->
        <a href='forms/doacao.php'>Doações</a>
        <a href="forms/contato.php">Contato</a>
        <a href="carrinho/Carrinho.php"><img id="carroça" src="carroça.png" ></a>
        <a href="carrinho/Sair.php">Cancelar compras</a>
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
  <section class='Comidas'>
        <?php
            foreach ($_SESSION['acessorios'] as $nome => $acessorio_produto) {
              foreach ($acessorio_produto as $imagem => $preço) {
                ?>
                <section class='comida'>
                    <img src='<?php echo $imagem ?>'>
                    <p><?php echo $nome ?>
                       <br/>Preço: R$ <?php echo $preço."0" ?>
                       <br><a href='?adicionar=<?php echo $nome ?>' class='botaodecomprar'>Adiconar ao carrinho</a></p>
                </section>
                <?php
              }
            }
        ?>
  </section>
              <!--  <section class='comida'>
                    <img src='Comidas/Pizza de carne.png'>
                    <p>Pizza de carne
                        <br>Preço: R$ R$28
                        <br><a href='comprar/pizza/pizza_html.php' class='botaodecomprar'>Comprar</a>
                    </p>
                </section>
                <section class='comida'>
                    <img src='Comidas/Calabresa premium.png'>
                    <p>Pizza calabresa premium <br>Preço: R$ 30
                    <br><a href='comprar/pizza/pizza_html.php' class='botaodecomprar'>Comprar</a></p>
                </section>
                <section class='comida'>
                    <img src='Comidas/Calabres default.png'>
                    <p>Pizza calabresa default
                       <br> Preço : R$ 20
                    <br><a href='comprar/pizza/pizza_html.php' class='botaodecomprar'>Comprar</a></p>
                </section> -->
    <section class='titulos'>
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
               <br><a href='?adicionar=<?php echo $nome ?>' class='botaodecomprar'>Adiconar ao carrinho</a></p>
             </section>
          <?php
        }
      }
      ?>
    </section>
    <!--
    <section class='Comidas'>
        <section class='comida'>
            <img src='Comidas/Sushi Gunkan.png'>
            <p>Sushi Gunkan
                <br> Preço : R$ 25
            <br><a href='comprar/sishu/sishu_html.php' class='botaodecomprar'>Comprar</a></p>
        </section>
        <section class='comida'>
            <img src='Comidas/Sushis/Sushi hot roll.png'>
            <p>Sushi Hossomaki Tekkamaki
                <br> Preço : R$ 22
            <br><a href='comprar/sishu/sishu_html.php' class='botaodecomprar'>Comprar</a></p>
        </section>
        <section class='comida'>
            <img src='Comidas/Sushis/Sushi Joe.png'>
            <p>Sushi Joe
                <br> Preço : R$ 28
            <br><a href='comprar/sishu/sishu_html.php' class='botaodecomprar'>Comprar</a></p>
        </section>
        <section class='comida'>
            <img src='Comidas/Sushis/Sushi Uramaki.png'>
            <p>Sushi Uramaki
                <br> Preço : R$ 18
            <br><a href='comprar/sishu/sishu_html.php' class='botaodecomprar'>Comprar</a></p>
        </section>
        </section>
      -->
        <section class='titulos'>
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
                     <br><a href='?adicionar=<?php echo $nome ?>' class='botaodecomprar'>Adiconar ao carrinho</a></p>
                   </section>
                <?php
              }
            }
            ?>
          </section>
          <!--
            <section class='comida'>
                <img src='Comidas/hamburguer/comida1.png'>
                <p>Hambúrguer comum
                    <br> Preço : R$ 24
                <br><a href='comprar/hamburguer/hamburguer_html.php' class='botaodecomprar'>Comprar</a></p>
            </section>
            <section class='comida'>
                <img src='Comidas/hamburguer/comida2.png'>
                <p>Hambúrguer de Frango
                    <br> Preço : R$ 21
                <br><a href='comprar/hamburguer/hamburguer_html.php' class='botaodecomprar'>Comprar</a></p>
            </section>
            <section class='comida'>
                <img src='Comidas/hamburguer/comida3.png'>
                <p>Hambúrguer MultiCheese
                    <br> Preço : R$ 32
                <br><a href='comprar/hamburguer/hamburguer_html.php' class='botaodecomprar'>Comprar</a></p>
            </section>
            <section class='comida'>
                <img src='Comidas/hamburguer/comida4.png'>
                <p>Big Hambúrguer
                    <br> Preço : R$ 37
                <br><a href='comprar/hamburguer/hamburguer_html.php' class='botaodecomprar'>Comprar</a></p>
            </section>
            </section>
          -->
            <section class='titulos'>
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
                         <br><a href='?adicionar=<?php echo $nome ?>' class='botaodecomprar'>Adiconar ao carrinho</a></p>
                       </section>
                    <?php
                  }
                }
                ?>
                <!--
              </section>
                <section class='comida'>
                    <img src='Comidas/Veganas/Salada comum.png'>
                    <p>Salada Comum
                        <br> Preço : R$ 23
                    <br><a href='comprar/vegana/vegana_html.php' class='botaodecomprar'>Comprar</a></p>
                </section>
                <section class='comida'>
                    <img src='Comidas/Veganas/Salada Molho Especial.png'>
                    <p>Salada Molho Especial
                        <br> Preço : R$ 25
                    <br><a href='comprar/vegana/vegana_html.php' class='botaodecomprar'>Comprar</a></p>
                </section>
                <section class='comida'>
                    <img src='Comidas/Veganas/Salada com vinagre.png'>
                    <p>Salada com Vinagre
                        <br> Preço : R$ 21
                    <br><a href='comprar/vegana/vegana_html.php' class='botaodecomprar'>Comprar</a></p>
                </section>
                <section class='comida'>
                    <img src='Comidas/Veganas/Salada tropical.png'>
                    <p>Salada Tropical
                        <br> Preço : R$ 26
                    <br><a href='comprar/vegana/vegana_html.php' class='botaodecomprar'>Comprar</a></p>
                </section>
            </section>
            </section>
    </section>
    </section>
  -->
</body>
</html>
