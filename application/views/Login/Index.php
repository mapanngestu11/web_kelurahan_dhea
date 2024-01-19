<!doctype html>
<html lang="en">
<head>
	<title>Website Kelurahan</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="<?php echo base_url()."assets/Front/images/icon.png"; ?>">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="<?php echo base_url()."assets/Login/"; ?>css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<style type="text/css">
	.gambar {
		vertical-align: middle;
		border-style: none;
		height: 100px;
		width: 100px;

	}
	body {
		background-color: #aab3bc;
	}
</style>
<body>
	<section class="ftco-section">
		<div class="container">


			<!-- ada label -->
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
						<div class="icon d-flex align-items-center justify-content-center">
							<img class="gambar" src="<?php echo base_url()."assets/Login/images/logo tangkot.png"; ?>">
						</div>
						<h4 class="text-center mb-4">Silahkan, Melakukan <strong>Login</strong> Terlebih Dahulu.</h4>
						<p><?php echo $this->session->flashdata('msg'); ?></p>
						<form action="<?php echo site_url() . 'Login/auth' ?>" class="login-form" method="POST">
							<div class="form-group">
								<input type="text" name="username" class="form-control rounded-left" placeholder="Username" required autocomplete="off">
							</div>
							<div class="form-group d-flex">
								<input type="password" name="password" class="form-control rounded-left" placeholder="*******" required autocomplete="off">
							</div>
							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
								<center>
									<a href="<?php echo base_url('Homepage/') ?>" class="mt-10">Kembali</a>
								</center>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="<?php echo base_url()."assets/Login/"; ?>js/jquery.min.js"></script>
	<script src="<?php echo base_url()."assets/Login/"; ?>js/popper.js"></script>
	<script src="<?php echo base_url()."assets/Login/"; ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url()."assets/Login/"; ?>js/main.js"></script>

</body>
</html>

