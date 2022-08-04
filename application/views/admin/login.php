<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login - Emirates Valley</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url()?>resource/images/favicon.png"/>
    <!-- Plugin styles -->
    <link rel="stylesheet" href="<?php echo base_url()?>resource/vendors/bundle.css" type="text/css">
    <!-- App styles -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/app.min.css" type="text/css">
</head>

<body class="form-membership">
<!-- begin::preloader-->
<div class="preloader">
    <div class="preloader-icon"></div>
</div>
<!-- end::preloader -->
<div class="form-wrapper">
    <!-- logo -->
    <?php /* ?><div id="logo">
        <img src="<?php echo base_url()?>resource/images/logo.png" alt="image">
    </div><?php */ ?>
    <!-- ./ logo -->
    <h5>Login</h5>
	<?php
		if(validation_errors() != ''){
			echo '<div class="alert alert-danger">'.validation_errors().'</div>';
		}
		if (isset($message_error)) {
			echo '<div class="alert alert-danger">';
				echo $message_error;
			echo "</div>";
	  	}
	?>
    <!-- form -->
    <form method="post" action="<?php echo base_url();?>admin/login">
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo set_value('username')?>" autofocus>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo set_value('password')?>">
        </div>
        <button type="submit" name="submit" value="Login" class="btn btn-primary btn-block">Login</button>
    </form>
    <!-- ./ form -->
</div>
<!-- Plugin scripts -->
<script src="<?php echo base_url()?>resource/vendors/bundle.js"></script>
<!-- App scripts -->
<script src="<?php echo base_url()?>assets/js/app.min.js"></script>
</body>
</html>