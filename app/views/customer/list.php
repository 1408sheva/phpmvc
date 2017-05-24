<?php

$customers =  $this->registry['customer'];

foreach($customers as $customer)  :
?>

    <div class="product">
        <p><h4> Прізвище та ім'я: <?=$customer['last_name'] . ' ' . $customer['first_name']?></h4></p>
        <p><h4> Мобільний телефон: <?=$customer['telephone']?></h4></p>
        <p><h4> Місто: <?=$customer['city']?></h4></p>
        <h4><span style="margin-left: 20px">
            <?php echo Helper::simpleLink('/customer/edit', 'Редагувати', array('id'=>$customer['customer_id'])). '</span>' ;
            echo '<span style="margin-left: 20px; color: red">'. Helper::simpleLink('/customer/delete', 'Видалення', array('id'=>$customer['customer_id']), 'red') . '</span>';
            echo '<span style="margin-left: 20px">'. Helper::simpleLink('/customer/revision', 'Перегляд', array('id'=>$customer['customer_id'])); ?>
        </span></h4>
    </div>
<?php endforeach; ?>

