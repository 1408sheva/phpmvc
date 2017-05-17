<?php 
    if ($this->registry['saved']) { echo '<p style="color:green">Продукт збережено</p>'; }
    $product =  $this->registry['product'];
?>
<form class="form-horizontal" role="form" method="post" action="#">
    <input type="hidden" class="form-control" name="id" value="<?php echo $product['id']?>">
  <div class="form-group">
    <label class="control-label col-sm-2" for="sku">Код:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="sku" value="<?php echo $product['sku']?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Назва:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" value="<?php echo $product['name']?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" forpriceemail">Ціна:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="price" value="<?php echo $product['price']?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="qty">Кількість:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="qty" value="<?php echo $product['qty']?>">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Зберегти</button>
    </div>
  </div>
</form>