<?php if( $customer = Helper::getCustomer()): ?>
<h3>Hello, <?php echo $customer['first_name'] . " " . $customer['last_name']; ?></h3>
<?php else: ?>
<h3>Hello, unauthorized user!</h3>
<?php endif; ?>

