<?php
use \helpers\form,
        \core\Error;
?>

<ol class="breadcrumb">
    <li><a href="<?php echo DIR; ?>">Home</a></li>
  <li class="active"><?php echo $data['title'] ?></li>
</ol>

<div class="page-header"><h1><?php echo $data['title'] ?></h1></div>
<?php echo Error::display($error); ?>

<form role="form" method="post" style="width: 50%;" class="center-block">
  <div class="form-group">
    <label for="username">User Name:</label>
    <input name="username" type="text" class="form-control" id="username" value="<?php if ($_POST['username']) echo $_POST['username']; ?>">
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input name="password" type="password" class="form-control" id="password">
  </div>
    <button name="submit" type="submit" class="btn btn-default">Submit</button>
</form> 