<?php
use \helpers\form,
    \helpers\Session;
?>
<ol class="breadcrumb">
    <li><a href="<?php echo DIR; ?>">Home</a></li>
  <li><a href="<?php echo DIR; ?>admin">Admin</a></li>
  <li class="active"><?php echo $data['title'] ?></li>
</ol>

<div class="page-header"><h1><?php echo $data['title'] ?></h1></div>
<p><?php echo Session::pull('message'); ?></p>
<a class="btn btn-md btn-default" href="<?php echo DIR ?>admin/users/add">Add User</a>

<table class="table">
    <thead>
        <tr>
        <th>name</th>
        <th>email</th>
        <th>last login</th>
        <th>action</th>
    </tr>
    </thead>
    <tbody>
        <?php
        if ($data['users'])
        {
            foreach ($data['users'] as $row)
            {
                echo '<tr>';
                echo '<td>'.$row->username.'</td>';
                echo '<td>'.$row->email.'</td>';
                echo '<td>'.$row->last_login.'</td>';
                echo '<td><a href='.DIR.'admin/users/edit/'.$row->id.'>Edit</a> <a href='.DIR.'admin/users/delete/'.$row->id.'>Delete</a></td>';
                echo '</tr>';
            }
        }
        ?>
    </tbody>
</table>
