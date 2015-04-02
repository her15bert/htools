<!DOCTYPE html>
<?php
use \helpers\Session;
?>

<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>

	<!-- Site meta -->
	<meta charset="utf-8">
	<title><?php echo $data['title'].' - '.SITETITLE; //SITETITLE defined in app/core/config.php ?></title>

	<!-- CSS -->
	<?php
		helpers\assets::css(array(
			helpers\url::bootstrap_path().'css/bootstrap.min.css',
      helpers\url::template_path().'default/css/style.css',
			helpers\url::template_path().'main/css/style.css',
		))
	?>

</head>
<body>

<div class="container">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo DIR; ?>"><?php echo SITETITLE; ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
            <?php
            if (Session::get('loggedin')) {
                echo '<li><a href="'.DIR.'admin">Admin</a></li>';
                
            }
            echo '<li><a href="'.DIR.'money">Money</a></li>';
            ?>
          
      </ul>
        
      <ul class="nav navbar-nav navbar-right">
            <?php
            if (Session::get('loggedin')) {
                echo '<li><a href="'.DIR.'admin/logout">Logout</a></li>';
            }
            else {
                echo '<li><a href="'.DIR.'admin/login">Login</a></li>';
            }
            ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>