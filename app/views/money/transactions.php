<?php
use \helpers\form,
    \helpers\Session;
?>
<ol class="breadcrumb">
    <li><a href="<?php echo DIR; ?>">Home</a></li>
  <li><a href="<?php echo DIR; ?>money">Money</a></li>
  <li class="active"><?php echo $data['title'] ?></li>
</ol>

<div class="page-header"><h1><?php echo $data['title'] ?></h1></div>
<p><?php echo Session::pull('message'); ?></p>

<a class="btn btn-md btn-default" href="<?php echo DIR ?>money/transactions/add">Add Transaction</a>


<table class="table">
    <thead>
        <tr>
            <th>Description</th>
            <th>Transfer From</th>
            <th>Transfer To</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($data['transactions']) {
            foreach ($data['transactions'] as $row) {
                echo '<tr>';
                echo '<td>'.$row->description.'</td>';
                echo '<td>'.$row->pathFrom.'</td>';
                echo '<td>'.$row->pathTo.'</td>';
                echo '<td>'.$row->amount.'</td>';
                echo '<td>'.$row->date.'</td>';
                echo '<td><a href='.DIR.'money/transactions/edit/'.$row->id.'>Edit</a> <a href='.DIR.'money/transactions/delete/'.$row->id.'>Delete</a></td>';
                echo '</tr>';
            }
        }
        ?>
    </tbody>
</table>