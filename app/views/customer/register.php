<?php
if (!empty($registry['errors_reg']) && !empty($_POST)){
    foreach ($registry['errors_reg'] as $k => $v){
        echo "<p class='errors'>$v <br></p>";
}}?>

<form class="form-horizontal" role="form" method="post" data-toggle="validator" action="#">
    <div id="errorBlock"></div>

    <div class="form-group">
        <label class="control-label col-sm-3" for="first_name">Ім'я</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="first_name" required value="<?php echo (!empty($_POST)) ? $_POST['first_name']: ''; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="last_name">Прізвище</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="last_name" value="<?php echo (!empty($_POST)) ? $_POST['last_name']: ''; ?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="telephone">Телефон</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="telephone" value="<?php echo (!empty($_POST)) ? $_POST['telephone']: ''; ?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="email">E-mail</label>
        <div class="col-sm-6">
            <input type="email" class="form-control" id="email" name="email"  value="<?php echo (!empty($_POST)) ? $_POST['email']: ''; ?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="password">Пароль</label>
        <div class="col-sm-6">
            <input type="password" data-minlength="8" class="form-control" name="password" id="pass" required>
            <div class="help-block">Ваш пароль повинен містити не меньше 6 символів.</div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="city">Підтвердження паролю</label>
        <div class="col-sm-6">
            <input type="password" class="form-control" name="passwordConfirm"  id="repPass" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Місто</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" value="<?php echo (!empty($_POST)) ? $_POST['city']: ''; ?>" name="city" required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-default" name="submit">Зберегти</button>
        </div>
    </div>
</form>