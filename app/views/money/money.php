<?php
use \helpers\form;
?>
<ol class="breadcrumb">
    <li><a href="<?php echo DIR; ?>">Home</a></li>
  <li><a href="<?php echo DIR; ?>admin">Admin</a></li>
  <li class="active"><?php echo $data['title'] ?></li>
</ol>

<div class="page-header"><h1><?php echo $data['title'] ?></h1></div>

<br><a class="btn btn-md btn-default" href="<?php echo DIR ?>money/accounts">Accounts</a>
<br><a class="btn btn-md btn-default" href="<?php echo DIR ?>money/transactions">Transactions</a>


<?php
if ($data['money'])
{
    echo '<p><h3>Income: '.$data['money']['income']['total'].'</h3></p>';
    foreach ($data['money']['income']['users'] as $key => $value) {
        echo '<p>'.$key.' = <b>'.$value.'</b></p>';
    }
    echo '<p>Total = <b>'.$data['money']['income']['total'].'</b></p>';
    
    echo '<p><h3>Expense: '.$data['money']['expense']['total'].'</h3></p>';
    foreach ($data['money']['expense']['users'] as $key => $value) {
        echo '<p>'.$key.' = <b>'.$value.'</b></p>';
    }
    echo '<p>Total = <b>'.$data['money']['expense']['total'].'</b></p>';
    
    echo '<p><h3>Difference: '.$data['money']['difference'].'</h3></p>';
    echo '<p>Total = <b>'.$data['money']['difference'].'</b></p>';
}
?>