<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<!-- fontawesome -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
		<!-- coustom css -->
		<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/homestyle.css">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		
		<title>BLOG</title>
	</head>
	<body>
		<!-- nav -->
		<!-- <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-transparent border-bottom" id="navbarTopFixed">
			<div class="container">
				<a class="navbar-brand" href="#">Home</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown p-2">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAuthor" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Authors
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownAuthor">
								<a class="dropdown-item" href="#">BK</a>
								<a class="dropdown-item" href="#">Jhon Doe</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">some moer</a>
							</div>
						</li>
						<li class="nav-item dropdown p-2">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Categories
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">Java</a>
								<a class="dropdown-item" href="#">Python</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Something</a>
							</div>
						</li>
						<li class="nav-item p-2">
							<a class="nav-link" href="posts.html">Post</a>
						</li>
						<li class="nav-item p-2">
							<a class="nav-link" href="#">Contact Us</a>
						</li>
					</ul>
					<form class="form-inline my-2 my-lg-0 p-2">
						<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
					</form>
				</div>
			</div>
		</nav> -->
		<!-- end Nav -->
		<!-- Banner -->
		<section>
			<div class="container-fluid">
				<div class="row justify-content-center align-items-center herosection">
					<div class="col-md-6 p-4 m-2 ">
						<h3 class="display-4 text-primary text-center text-light">Register</h3>
						<form action="<?php echo URLROOT; ?>/users/register" method="post">
							<div class="form-group">
								<label for="name">Name: <sup>*</sup> </label>
								<input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
								<span class="invalid-feedback">
									<?php echo $data['name_error']; ?>
								</span>
							</div>
							<div class="form-group">
								<label for="email">Email: <sup>*</sup> </label>
								<input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
								<span class="invalid-feedback">
									<?php echo $data['email_error']; ?>
								</span>
							</div>
							<div class="form-group">
								<label for="password">Password: <sup>*</sup> </label>
								<input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
								<span class="invalid-feedback">
									<?php echo $data['password_error']; ?>
								</span>
							</div>
							<div class="form-group">
								<label for="confirm_password">Confirm Password: <sup>*</sup> </label>
								<input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
								<span class="invalid-feedback">
									<?php echo $data['confirm_password_error']; ?>
								</span>
							</div>
							<div class="row">
								<div class="col">
									<input type="submit" name="submit" value="Register" class="btn btn-success btn-block">
								</div>
								<div class="col">
									<a href="<?php echo URLROOT; ?>/users/login" title="Login" class="btn btn-light btn-block">Already Have An Account? Login</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<!--end Banner -->
		
		<!-- main -->
		<!-- <main>
				<div class="container">
						<div class="row justify-content-center align-items-center herosection">
								<div class="col-md-6 p-4 m-2">
										<h3 class="display-4 text-primary text-center">Login</h3>
										<form class="p-4 text-center">
												<div class="input-group p-2">
														<input type="email" name="user_email" value="" placeholder="Please Enter Email" class="form-control">
												</div>
												<div class="input-group p-2">
														<input type="password" name="user_password" value="" placeholder="Please Enter Password" class="form-control">
												</div>
												<input type="submit" name="login" value="Login" class="btn btn-primary">
										</form>
								</div>
						</div>
				</div>
		</main> -->
		<!-- End main -->
		<!-- foooter -->
		<footer class="bg-dark px-5 pb-5">
			<div class="container">
				<div class="text-center text-light">
					<h2 class="p-2">Stay Connected</h2>
					<div class="row justify-content-center">
						<div class="col-md-6">
							<form>
								<div class="input-group">
									<input type="email" name="email" value="" placeholder="Enter Email Address" class="form-control">
									<div class="input-group-append">
										<button type="button" class="btn btn-danger text-white text-uppercase font-weight-bold">Sing Up</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<ul class="list-unstyled p-4">
						<li class="list-inline-item"><i class="fab fa-facebook text-primary fa-2x"></i></li>
						<li class="list-inline-item"><i class="fab fa-twitter text-info fa-2x"></i></li>
						<li class="list-inline-item"><i class="fab fa-youtube text-danger fa-2x"></i></li>
						<li class="list-inline-item"><i class="fab fa-linkedin text-primary fa-2x"></i></li>
					</ul>
				</div>
				<h2 class="display-4 text-center text-white">&copy; MTB</h2>
			</div>
		</footer>
		<!-- end Footer -->
		
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS at last costom js -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<script src="<?php echo URLROOT; ?>/js/all.js" type="text/javascript"></script>
	</body>
</html>