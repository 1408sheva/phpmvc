<?php
$model = $this->getModel('Product');
$data = $model->getItem($this->getId());
$id = $data['id'];?>
<form class="form-horizontal" role="form" method="post" action="/product/delete/">
    <div class="form-group">
        <div class="col-sm-10" style="text-align: center">
            <h2>Чи бажаєте видалити продукт ??</h2>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10" style="text-align: center;width: 540px;">
            <button type="submit" class="btn btn-default"  name="delete" style="margin-right:80px; background: orange; color: red">Видалити</button>
            <button type="submit" class="btn btn-default" name="cancel">Скасувати</button>
        </div>
    </div>
    <input type="hidden" name="id" value="<?=$id;?>">
</form>
