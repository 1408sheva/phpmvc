<?php var_dump($_SERVER);
    if (isset($this->invalid_password)) {
        echo "<p style=\"color:red\"> Неправильні ім'я або пароль!</p>"; 
    }
?>
<form class="form-horizontal" role="form" method="post" action="#">
    <input type="hidden" class="form-control" name="id" value="">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Емейл:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" value="">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="password">Пароль:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="password" value="">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Увійти</button>
    </div>
  </div>
</form>
