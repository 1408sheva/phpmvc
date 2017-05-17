<?php
echo ($this->registry['saved']==2)? '<p style="color:red">E-mail використовується</p>' : '';
echo ($this->registry['saved']==3)? '<p style="color:red">Не правильно ведено пароль.</p>' : '';
?>
<form class="form-horizontal" role="form" method="post" data-toggle="validator" action="#">
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
            <input type="password" data-minlength="8" class="form-control" name="password" id="password"required>
            <div class="help-block">Ваш пароль повинен містити 8 символів верхнього і нижнього регістрів і цифри.</div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="city">Підтвердження паролю</label>
        <div class="col-sm-6">
            <input type="password" class="form-control" name="passwordConfirm" data-match="#password" data-match-error="Паролі не однакові" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="telephone">Місто</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" value="<?php echo (!empty($_POST)) ? $_POST['city']: ''; ?>" name="city" required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-default">Зберегти</button>
        </div>
    </div>
</form>