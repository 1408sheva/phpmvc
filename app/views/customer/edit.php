<?php 
    if ($this->registry['saved']) { echo '<p style="color:green">Продукт збережено</p>'; }
    $product =  $this->registry['customer'];
?>
<form class="form-horizontal" role="form" method="post" action="#">
    <input type="hidden" class="form-control" name="id" value="<?php echo $product['customer_id']?>">
    <div class="form-group">
    <label class="control-label col-sm-2" for="first_name">Прізвище:</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="last_name" value="<?php echo $product['last_name']?>">
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="first_name">Ім’я:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="first_name" value="<?php echo $product['first_name']?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="telephone">Телефон:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="telephone" value="<?php echo $product['telephone']?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" ">Емейл:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="email" value="<?php echo $product['email']?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="city">Місто:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="city" value="<?php echo $product['city']?>">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Зберегти</button>
    </div>
  </div>
</form>