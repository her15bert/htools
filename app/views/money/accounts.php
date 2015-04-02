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

<a class="btn btn-md btn-default" href="<?php echo DIR ?>money/accounts/add">Add Account</a>


<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Type</th>
            <th>Parent Account</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($data['accounts']) {
            foreach ($data['accounts'] as $row) {
                echo '<tr>';
                echo '<td>'.$row->name.'</td>';
                echo '<td>'.$row->description.'</td>';
                echo '<td>'.$row->type.'</td>';
                echo '<td>'.$row->parentAccount.'</td>';
                echo '<td><a href='.DIR.'money/accounts/edit/'.$row->id.'>Edit</a> <a href='.DIR.'money/accounts/delete/'.$row->id.'>Delete</a></td>';
                echo '</tr>';
            }
        }
        ?>
    </tbody>
</table>