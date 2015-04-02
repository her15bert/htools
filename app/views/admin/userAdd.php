<?php
use \helpers\form,
        \core\Error;
?>
<ol class="breadcrumb">
  <li><a href="<?php echo DIR; ?>">Home</a></li>
  <li><a href="<?php echo DIR; ?>admin">Admin</a></li>
  <li><a href="<?php echo DIR; ?>admin/users">Users</a></li>
  <li class="active"><?php echo $data['title'] ?></li>
</ol>

<div class="page-header"><h1><?php echo $data['title'] ?></h1></div>
<?php echo Error::display($error); ?>

<form role="form" method="post" style="width: 50%;">
  <div class="form-group">
    <label for="username">Username:</label>
    <input name="username" type="text" class="form-control" id="username" value="<?php if (isset($error)) {echo $_POST['username'];}?>">
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input name="password" type="password" class="form-control" id="password">
  </div>
    <div class="form-group">
    <label for="email">Email:</label>
    <input name="email" type="text" class="form-control" id="email" value="<?php if (isset($error)) {echo $_POST['email'];}?>">
  </div>
<button name="submit" type="submit" class="btn btn-default">Submit</button>
</form> 