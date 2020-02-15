<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>LOGIN</title>


	<link href="<?= base_url ('assets/css/bootstrap.min.css');?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/sb-admin-2.css');?>" rel="stylesheet">

</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-default">
					<!-- <div class="panel-heading">
						<h3 class="panel-title" align="center">Silahkan Login</h3>
					</div> -->
					<div class="panel-body">
						<div id="notifications">
						<?php 
						if (!empty($notif)) {
							echo '<div class="alert alert-danger">';
							echo $notif;
							echo '</div>';
						}
						?>	
						</div>
						<center>
							<!-- <img src="<?= base_url('assets/images/tribun1.jpg'); ?>"> -->
							<h3>SiGa Login</h3>
						</center><br>
						
						<form role="form" action="<?= base_url('Login/dologin'); ?>" method="post">
							<fieldset>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon"><span class="text-primary glyphicon glyphicon-user"></span></div>
										<input class="form-control" placeholder="NIP" name="username" type="text" autofocus required>
									</div>
									
								</div>

								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon"><span class="text-primary glyphicon glyphicon-lock"></span></div>
										<input class="form-control" placeholder="Password" name="password" type="password" required>
									</div>
								</div>
								
								<input type="submit" name="submit" value="Login" class="btn btn-lg btn-succes btn-block">
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>

