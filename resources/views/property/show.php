
<h1>Página Single - Imóveis</h1>

<?php
    if(!empty($property)){

        foreach ($property as $item) {

            ?>

            <h2>Título do Imóvel: <?= $item->title;?></h2>

            <p>Dsecrição: <?= $item->description;?></p>

            <p>Valor de Locação: R$ <?= number_format($item->rental_price, 2, ',', '.');?></p>

            <p>Valor de Compra: R$ <?= number_format($item->sale_price, 2, ',', '.');?></p>

            <?php

        }
    }
?>
