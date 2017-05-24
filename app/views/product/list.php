<?php  if (!empty($_COOKIE['sortparams'])){$s = unserialize($_COOKIE['sortparams']);};?>
<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
<select name='sortfirst'>
    <option <?php echo filter_input(INPUT_POST, 'sortfirst') === 'price_ASC' ? 'selected' : '';?> value="price_ASC" <?php
    if (!empty($s['price'])) {if ($s['price'] == "ASC"){ echo 'selected';}}?>
    >від дешевших до дорожчих</option>
    <option <?php echo filter_input(INPUT_POST, 'sortfirst') === 'price_DESC' ? 'selected' : '';?> value="price_DESC" <?php
    if (!empty($_POST['sortfirst'])){if ($_POST['sortfirst'] == 'price_DESC') echo 'selected';}
    elseif (!empty($s['price'])) {if ($s['price'] == "DESC"){ echo 'selected';}}?>
    >від дорожчих до дешевших</option>
</select>
<select name='sortsecond'>
  <option <?php echo filter_input(INPUT_POST, 'sortsecond') === 'qty_ASC' ? 'selected' : '';?>  value="qty_ASC"  <?php
  if (!empty($s['qty'])) { if ($s['qty'] == "ASC"){ echo 'selected';}}?>
  >по зростанню кількості</option>
  <option <?php echo filter_input(INPUT_POST, 'sortsecond') === 'qty_DESC' ? 'selected' : '';?>  value="qty_DESC" <?php
  if (!empty($_POST['sortfirst'])){if ($_POST['sortfirst'] == 'qty_DESC') echo 'selected';}
  elseif (!empty($s['qty'])) {if ($s['qty'] == "DESC"){ echo 'selected';}}?>  >по спаданню кількості</option>
</select>
<input type="submit" value="Submit">
</form>

<div class="product"><p>
        <?php echo Helper::simpleLink('/product/add', 'Додати товар'); ?>
</p></div>

<?php

$products =  $this->registry['products'];

foreach($products as $product)  :
?>

    <div class="product">
        <p class="sku">Код: <?php echo $product['sku']?></p>
        <h4><?php echo $product['name']?><h4>
        <p> Ціна: <span class="price"><?php echo $product['price']?></span> грн</p>
        <p> Кількість: <?php echo $product['qty']?></p>
        <p> Опис товару: <?php echo htmlspecialchars_decode($product['description']);?></p>
        <p><?php if(!$product['qty'] > 0) { echo 'Нема в наявності'; } ?></p>
        <span style="margin-left: 20px">
            <?php echo Helper::simpleLink('/product/edit', 'Редагувати', array('id'=>$product['id'])). '</span>' ;
            echo '<span style="margin-left: 20px; color: red">'. Helper::simpleLink('/product/delete', 'Видалення', array('id'=>$product['id']), 'red') . '</span>';
            echo '<span style="margin-left: 20px">'. Helper::simpleLink('/product/revision', 'Перегляд', array('id'=>$product['id'])); ?>
        </span>
    </div>
<?php endforeach; ?>