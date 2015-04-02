<?php
use \helpers\form,
        \core\Error;
?>
<ol class="breadcrumb">
  <li><a href="<?php echo DIR; ?>">Home</a></li>
  <li><a href="<?php echo DIR; ?>money">Money</a></li>
  <li><a href="<?php echo DIR; ?>money/accounts">Accounts</a></li>
  <li class="active"><?php echo $data['title'] ?></li>
</ol>

<div class="page-header"><h1><?php echo $data['title'] ?></h1></div>
<?php echo Error::display($error); ?>
<form role="form" method="post" style="width: 50%;" class="center-block">
  <div class="form-group">
    <label for="accountName">Account Name:</label>
    <input name="accountName" type="text" class="form-control" id="accountName" value="<?php echo $data['account']->name;?>">
  </div>
  <div class="form-group">
    <label for="description">Description:</label>
    <input name="description" type="text" class="form-control" id="description" value="<?php echo $data['account']->description;?>">
  </div>
  <div class="form-group">
    <label for="notes">Notes</label>
    <input name="notes" type="text" class="form-control" id="notes" value="<?php echo $data['account']->notes;?>">
  </div>
  <div class="form-group">
      <label for="accountType">Account Type:</label>
      <select class="form-control" name="accountType" id="accountType">
      <?php
      if ($data['accountTypes']) {
        foreach ($data['accountTypes'] as $row) {
            if ($row->name==$data['account']->type) {
                echo '<option value="'.$row->name.'" selected>'.$row->name.'</option><br>';
            } else {
                echo '<option value="'.$row->name.'">'.$row->name.'</option><br>';
            }
                
        }
      }
      ?>
      </select>
  </div>
  <div class="form-group">
    <label for="parentAccount">Parent Account:</label>
    <input name="parentAccount" type="text" class="form-control" id="parentAccount" value="<?php echo $data['account']->parentAccount;?>">
  </div>
<button name="submit" type="submit" class="btn btn-default">Submit</button>
</form> 