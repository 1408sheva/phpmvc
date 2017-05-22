<?php
    var_dump($registry);
?>
<form class="form-horizontal" role="form" method="post" action="#">
    <input type="hidden" class="form-control" name="id" value="<?php if (!empty($_POST['id'])){echo $_POST['id'];}?>">
  <div class="form-group">
    <label class="control-label col-sm-2" for="sku">Код:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="sku" value="<?php if (!empty($_POST['sku'])){echo $_POST['sku'];}?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Назва:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" value="<?php if (!empty($_POST['name'])){echo $_POST['name'];}?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" forpriceemail">Ціна:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="price" value="<?php if (!empty($_POST['price'])){echo $_POST['price'];}?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="qty">Кількість:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="qty" value="<?php if (!empty($_POST['qty'])){echo $_POST['price'];}?>">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Додати</button>
    </div>
  </div>

  <div class="errors">
<!--      --><?php
//      if (!empty($file) && isset($file)) {
//          foreach ($file as $a){
//              echo '- ' . $a  . '<br>';
//          }
//      }
//      ?>
  </div>
</form>
