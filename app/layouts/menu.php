<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
    <?php 
        $menu = Helper::getMenu();
        foreach($menu as $item)  :
    ?>
        <li>
            <?php echo Helper::simpleLink($item['path'], $item['name']); ?>
        </li>
    <?php endforeach; ?>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <?php if( $customer = Helper::getCustomer()): ?>
      <li><a href="<?php echo BP;?>/customer/register/"><span class="glyphicon glyphicon-user"></span>
              <?php echo $customer['first_name'] . " " . $customer['last_name']; ?>
      </a></li>
      <li><a href="<?php echo BP;?>/customer/logout/"><span class="glyphicon glyphicon-log-out"></span> Logaut</a></li>
        <?php else: ?>
      <li><a href="<?php echo BP;?>/customer/register/"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="<?php echo BP;?>/customer/login/"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <?php endif; ?>

    </ul>
  </div>
</nav>