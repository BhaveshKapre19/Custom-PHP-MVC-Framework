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
		
		<title><?php echo $data['title']; ?></title>
	</head>
	<body>
		<!-- nav -->
		<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-transparent border-bottom" id="navbarTopFixed">
			<div class="container">
				<a class="navbar-brand" href="<?php echo URLROOT; ?>">Home</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown p-2">
							<a class="nav-link dropdown-toggle change_active" href="#" id="navbarDropdownAuthor" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Authors
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownAuthor">
								<?php foreach ($data['user'] as $user): ?>
									<a class="dropdown-item" href="<?php echo URLROOT; ?>/Posts/Author/<?php echo $user->user_id ?>"><?php echo $user->user_name; ?></a>
								<?php endforeach ?>
								
							</div>
						</li>
						<li class="nav-item dropdown p-2">
							<a class="nav-link dropdown-toggle change_active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Categories
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<?php foreach ($data['categorie'] as $categorie): ?>
									<a class="dropdown-item" href="<?php echo URLROOT; ?>/Posts/categorie/<?php echo $categorie->categorie_name; ?>"><?php echo $categorie->categorie_name; ?></a>
								<?php endforeach ?>
							</div>
						</li>
						<li class="nav-item p-2">
							<a class="nav-link change_active" href="<?php echo URLROOT ?>/posts/index">Post</a>
						</li>
						<li class="nav-item p-2">
							<a class="nav-link change_active" href="<?php echo URLROOT ?>/home/aboutUs">About Us</a>
						</li>
					</ul>
					<form class="form-inline my-2 my-lg-0 p-2" method="get" action="<?php echo URLROOT ?>/posts/Search">
						<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
					</form>
				</div>
			</div>
		</nav>
		<!-- end Nav -->
		<!-- Banner -->
		<?php $urlOfCrntPg = $_SERVER['PHP_SELF'];

		$urlOfCrntPg = explode('/',$urlOfCrntPg);

		?>
		<?php if ($urlOfCrntPg['3']=='login.php'): ?>
			<h3>HEllO Login</h3>
		<?php else: ?>
			<section>
				<div class="container-fluid">
					<div class="row herosection justify-content-center align-items-center">
						<div class="col-sm-10 text-center">
							<h4 class="display-1 text-light"><?php echo $data['banner_Header_Text']; ?></h4>
							<span class="text-light display-4 font-italic font-confortaa"><?php echo $data['banner_Sub_Text']; ?></span>
						</div>
					</div>
				</div>
			</section>
		<?php endif ?>
		
		<!--end Banner -->
		<main>