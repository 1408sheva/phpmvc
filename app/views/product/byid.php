<?php $product =  $this->registry['product']; ?>

    <div class="product">
        <p class="sku">Код: <?php echo $product['sku']?></p>
        <h4><?php echo $product['name']?><h4>
        <p> Ціна: <span class="price"><?php echo $product['price']?></span> грн</p>
        <p><?php if(!$product['qty'] > 0) { echo 'Нема в наявності'; } ?></p>
    </div>


