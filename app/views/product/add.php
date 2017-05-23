<form class="form-horizontal" role="form" method="post" action="#">
    <?php
    if (isset($registry['save_add'])) {
        echo '<h2 style="border: 2px dotted #99ff11; color: #ff9328; padding: 8px; width: 300px;">Продукт збережено</h2>';
    ?>
    <a style="margin-bottom: 10px" href="/product/list/">Перейти до перегуляду товарів</a>
    <?php } ?>
    <input type="hidden" class="form-control" name="id" value="<?php if (!empty($_POST['id'])){echo $_POST['id'];}?>" required>
  <div class="form-group" style="margin-top: 10px;">
    <label class="control-label col-sm-2" for="sku">Код:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="sku" value="<?php if (!empty($_POST['sku'])){echo $_POST['sku'];}?>" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Назва:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" value="<?php if (!empty($_POST['name'])){echo $_POST['name'];}?>" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" forpriceemail">Ціна:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="price" value="<?php if (!empty($_POST['price'])){echo $_POST['price'];}?>" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="qty">Кількість:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="qty" value="<?php if (!empty($_POST['qty'])){echo $_POST['qty'];}?>" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="description">Опис товару:</label>
    <div class="col-sm-10">
        <textarea class="form-control" name="description" required><?php if (!empty($_POST['description'])){echo $_POST['description'];} ?></textarea>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Додати</button>
    </div>
  </div>

  <div class="errors">
      <?php
      if (!empty($registry['error_add']) && isset($registry['error_add'])) {
          foreach ($registry['error_add'] as $a){
              echo '- ' . $a  . '<br>';
          }
      }
      ?>
  </div>
</form>
