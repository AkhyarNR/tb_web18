<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/my-login.css');?>">
</head>
<body class="my-login-page">
	<section>
		<div align="left">
			<img class="logo" src="<?php echo base_url('assets/img/logoPolije.png');?>" alt="Axquired Apps" width="100" height="100"/>	
		</div>
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
							<?php if(isset($error)){ ?>
						      <div class="alert alert-danger alert-dismissible">
						        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						        <?php echo $error; ?>
						      </div>
						    <?php } ?>
							<form method="POST" action="<?php echo base_url('dosen/masuk')?>">
								<div class="form-group">
									<label for="username">Username</label>
									<input id="username" type="text" class="form-control" name="username" value="" required autofocus>
								</div>

								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
								</div>

								<div class="form-group no-margin">
									<button type="submit" class="btn btn-primary btn-block">
										Login
									</button>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						<p class="copyright text-center">
                            &copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="#">Polije MIF16</a>, Pengajuan Judul Tugas Akhir
                        </p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="<?php echo base_url('js/jquery.min.js');?>"></script>
	<script src="<?php echo base_url('bootstrap/js/bootstrap.min.js');?>"></script>
	<script src="<?php echo base_url('js/my-login.js');?>"></script>
</body>
</html>