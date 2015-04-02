<?php
use \helpers\form,
        \core\Error;
?>
<ol class="breadcrumb">
  <li><a href="<?php echo DIR; ?>">Home</a></li>
  <li><a href="<?php echo DIR; ?>money">Money</a></li>
  <li><a href="<?php echo DIR; ?>money/transactions">Transactions</a></li>
  <li class="active"><?php echo $data['title'] ?></li>
</ol>

<div class="page-header"><h1><?php echo $data['title']; ?></h1></div>
<?php echo Error::display($error); ?>

<form role="form" method="post" style="width: 50%;">
  <div class="form-group">
    <label for="date">Date:</label>
    <input name="date" type="datetime" class="form-control" id="date" value="<?php if (isset($error)) {echo $_POST['date'];}?>">
  </div>
  <div class="form-group">
    <label for="description">Description:</label>
    <input name="description" type="text" class="form-control" id="description" value="<?php if (isset($error)) {echo $_POST['description'];}?>">
  </div>
  <div class="form-group">
      <label for="transferFrom">Transfer From:</label>
      <select class="form-control" name="transferFrom" id="transferFrom">
      <?php
      if ($data['accountPaths']) {
        foreach ($data['accountPaths'] as $row) {
            $selected = '';
            if (isset($error)) {
                if ($row->idTo==$_POST['transferFrom']) {
                    $selected = 'selected';
                }
            }
            echo '<option value="'.$row->idTo.'" '.$selected.'>'.$row->pathTo.'</option><br>';
        }
      }
      ?>
      </select>
  </div>
  <div class="form-group">
      <label for="transferTo">Transfer To:</label>
      <select class="form-control" name="transferTo" id="transferTo">
      <?php
      if ($data['accountPaths']) {
        foreach ($data['accountPaths'] as $row) {
            $selected = '';
            if (isset($error)) {
                if ($row->idTo==$_POST['transferTo']) {
                    $selected = 'selected';
                }
            }
            echo '<option value="'.$row->idTo.'" '.$selected.'>'.$row->pathTo.'</option><br>';
        }
      }
      ?>
      </select>
  </div>
  <div class="form-group">
    <label for="amount">Amount:</label>
    <input name="amount" type="number" class="form-control" id="amount" value="<?php if (isset($error)) {echo $_POST['amount'];}?>">
  </div>
<button name="submit" type="submit" class="btn btn-default">Submit</button>
</form> 