<?php
session_start();
?>
<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Connexion</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="piscine.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />-->



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://use.fontawesome.com/53fe4ef42f.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<!--include popper.js-->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.sticky/1.0.4/jquery.sticky.js"></script>
	<script src="accueil.js" type="text/javascript"></script>


</head>

<body>


	<div class="container">

		<div class="row d-flex justify-content-center items-align-center">
			<div class="col-lg-12">


				<nav class="navbar d-flex justify-content-center items-align-center ">
					<a class="navbar-brand" href="accueil.php"><img src="images/logo.png" width="20%"></a>

				</nav>
			</div>
		</div>

	</div>

	<div class="container">

		<div class="row d-flex justify-content-center items-align-center">

			<div class="container slider">
				<div class="row row-slider">
					<div class="col-lg-12 col-slider">
						<div id="carouselIndicators" class="carousel slide carousel-fade" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
								<li data-target="#carouselIndicators" data-slide-to="1"></li>
								<li data-target="#carouselIndicators" data-slide-to="2"></li>
							</ol>
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img class="d-block w-100" src="images/fond1.jpg" alt="First slide">
									<div class="carousel-caption d-none d-md-block">
										<h1>Heureux de vous revoir </h1>


									</div>
								</div>
								<div class="carousel-item">
									<img class="d-block w-100 " src="images/fond2.jpg" alt="Second slide">
								</div>

							</div>
							<a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>

					</div>
				</div>
			</div>



		</div>

	</div>

	<div class="container">

		<div class="row d-flex justify-content-center items-align-center">

			<a href="connexion_client.php"><button class="btn my-4 mx-4" style="background: #31405F; border:none; color:#fff;" type="submit">En tant qu'acheteur</button></a>
			<a href="connexion_vendeur.php"><button class="btn my-4 mx-4 " style="background: #31405F; border:none; color:#fff;" type="submit">En tant que vendeur</button></a>

		</div>

	</div>




	<div class="container">
		<div class="row-width-max">
			<?php include('footer_client.php'); ?>
		</div>
	</div>


</body>

</html>