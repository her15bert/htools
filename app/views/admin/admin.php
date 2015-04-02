<?php
use \helpers\form;
?>

<ol class="breadcrumb">
  <li><a href="<?php echo DIR; ?>">Home</a></li>
  <li class="active"><?php echo $data['title'] ?></li>
</ol>
<div class="page-header"><h1><?php echo $data['title'] ?></h1></div>
<a class="btn btn-md btn-default" href="<?php echo DIR ?>admin/users">Users</a>
<a class="btn btn-md btn-default" href="<?php echo DIR ?>money">Money</a>


