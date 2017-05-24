<?php $model = $this->getModel('Customer');
$customer = $model->getItem($this->getId());?>


<div class="product">
    <p><h4> Прізвище та ім'я: <?=$customer['last_name'] . ' ' . $customer['first_name']?></h4></p>
    <p><h4> Мобільний телефон: <?=$customer['telephone']?></h4></p>
    <p><h4> Місто: <?=$customer['city']?></h4></p>
</div>
