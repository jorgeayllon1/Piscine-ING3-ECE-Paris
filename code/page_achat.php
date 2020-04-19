<?php
	session_start();

	/**Accès bdd */

	$database = "ebayece";
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);


	$sql = "SELECT * FROM les_items";

	#Cette fonction prend en paramètre l'id d'une image et le msqli_connect (db_handle)
	#Cette fonction va renvoyer toutes les images d'un items sous forme d'un tableau (array)
	function chemins_dune_image($id_item, $db_handle)
	{
		$sql =
			"SELECT chemin from photo 
		inner join les_items
			on les_items.id = photo.id_item
			where les_items.id=$id_item";

		$result = mysqli_query($db_handle, $sql);

		while ($data = mysqli_fetch_assoc($result)) {
			$leschemins[] = $data["chemin"];
		}
		return $leschemins;
	}


	$result = mysqli_query($db_handle, $sql);

	/**On récupère le choix de l'utilisateur dans des var  */

	$categorie = isset($_POST["categorie"])?$_POST["categorie"]:"";
	$type_achat = isset($_POST["type_achat"])?$_POST["type_achat"]:"";

	if(isset($_POST['bouton_filtrer']))
	{

		if($db_found)
		{
			/**Boucle qui va parcourir toutes les combinaisaons de choix */
			for($i=1 ; $i<4 ;$i++)
			{
				for($j=1 ; $j<4 ;$j++)
				{
					if($categorie==$i AND $type_achat==$j)
					{
						$sql = "SELECT * FROM les_items WHERE categorie = $categorie AND type ='$type_achat'";
						$result = mysqli_query($db_handle,$sql);
						
					}
					

				}
			}
			/**Restes les choix vides d'und es deux selection */
			if($categorie==1 AND $type_achat==4)
			{
				$sql = "SELECT * FROM les_items WHERE categorie = 1";
				$result = mysqli_query($db_handle,$sql);
				
			}			
			else if($categorie==2 AND $type_achat==4)
			{
				$sql = "SELECT * FROM les_items WHERE categorie = 2";
				$result = mysqli_query($db_handle,$sql);
				
			}
			else if($categorie==3 AND $type_achat==4)
			{
				$sql = "SELECT * FROM les_items WHERE categorie = 3";
				$result = mysqli_query($db_handle,$sql);
				
			}
			else if($categorie==4 AND $type_achat==1)
			{
				$sql = "SELECT * FROM les_items WHERE  type =1";
				$result = mysqli_query($db_handle,$sql);
				
			}
			else if($categorie==4 AND $type_achat==2)
			{
				$sql = "SELECT * FROM les_items WHERE  type =2";
				$result = mysqli_query($db_handle,$sql);
				
			}
			else if($categorie==4 AND $type_achat==3)
			{
				$sql = "SELECT * FROM les_items WHERE  type =3";
				$result = mysqli_query($db_handle,$sql);
				
			}
		}

	}
	

?>
<!DOCTYPE html>
<!--FICHIER TEST-->

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Page achat</title>

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

	<div class="container-fluid">
		<div class="row d-flex justify-content-center">
			<nav class="navbar navbar-expand-md col-lg-12" style="border-bottom:solid #E7E7E7 ;">
				<a class="navbar-brand" href="accueil.php"><img src="images/logo.png" width="20%"></a>
				<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="main-navigation">
					<ul class="navbar-nav">
						<!-- La suite de ce code php va soit afficher des boutons de connexion si l'utilisateur n'est pas connecter-->
						<!-- Soit afficher son nom et prenom avec une redirection vers son compte -->
						<?php
						if (!isset($_SESSION["id_user"])) {
							echo '<li class="nav-item"><a class="nav-link" href="inscription.php"><i class="fa fa-user-plus"></i> S\'inscrire</a></li>';
							echo '<li class="nav-item"><a class="nav-link" href="connexion.php"><i class="fa fa-sign-in"></i> Se connecter</a></li>';
						} else {
							echo '<li class="nav-item"><a class="nav-link" href="redirect_moncompte.php">' . $_SESSION["nom"] . ' ' . $_SESSION["prenom"] . '</a></li>';
							echo '<li class="nav-item"><a class="nav-link" href="deco.php">Se déconnecter</a></li>';
						}
						?>
					</ul>
				</div>
			</nav>

			<div class="col-lg-6 my-1">
				<div class="input-group-prepend">
					<img src="images/logo-footer.png" width="20%">
					<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Catégories
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="#">Ferraille ou Trésor</a>
						<a class="dropdown-item" href="#">Bon pour le musée</a>
						<a class="dropdown-item" href="#">Accessoire VIP</a>
						<div role="separator" class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Filtrer</a>
					</div>

					<input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Rechercher..."><button> <i class="fa fa-search"></i></button>
				</div>
			</div>
			<div class="col-lg-1 my-1 text-md-right">
				<a href="panier.php"><button class="btn" style="border-radius: 10px;"> <i class="fa fa-shopping-basket"></i> </button></a>
			</div>
		</div>
	</div>

	<div class="container my-4">
		<div class="row">

			<h5>Filtrer selon le type d'achat et la catégorie:  </h5>

			<form action="page_achat.php" method="post">

			<div class="form-group mx-2">
				<select class="form-control" name="categorie" id="categorie">
					<option value="1">Ferraille ou trésor</option>
					<option value="2">Bon pour le musée</option>
					<option value="3">Accessoire VIP</option>
					<option value="4" selected><option>
				</select>
			</div>

			<div class="form-group mx-2 mt-2">
				<select class="form-control" name="type_achat" id="type_achat">
					<option value="1">Enchères</option>
					<option value="2">Achat immédiat</option>
					<option value="3">Meilleure offre</option>
					<option value="4" selected><option>
				</select>
			</div>

			<button class="btn btn-primary" name="bouton_filtrer">Appliquer</button>
			</form>


		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="table-responsive">
				<table class="table table-produit">
					<thead class="table-bordered font-weight-bold" style="background-color: aliceblue;">
						<tr>
							<th scope="col">Photo</th>
							<th scope="col">Produit</th>
							<th scope="col">Description</th>
							<th scope="col">Catégorie</th>
							<th scope="col">Type de vente</th>
							<th scope="col">Fin enchère dans</th>
							<th scope="col">Prix</th>
						</tr>
					</thead>

					<tbody>
						<!-- CODE POUR AFFICHER N ITEMS -->
						<!-- NON OPTI : problem d'accée au donnée, ne peut se faire une seule fois dans le code (ICI)-->
						<?php

						while ($elements = mysqli_fetch_assoc($result)) {
							echo '<tr>';
							echo '<th scope="row"><img src="' . chemins_dune_image($elements["id"], $db_handle)[0] . '" width="80px" height="80px" ></th>';
							echo '<td>' . $elements["nom"] . '</td>';
							echo '<td>' . $elements["description"] . '</td>';
							switch ($elements["categorie"]) {
								case 1:
									echo '<td>Ferraille ou trésor</td>';
									break;
								case 2:
									echo '<td>Bon pour le Musée</td>';
									break;
								case 3:
									echo '<td>Accessoire VIP</td>';
									break;
							}
							switch ($elements["type"]) {
								case 1:
									echo '<td>Enchères</td>';
									break;
								case 2:
									echo '<td>Achetez-le Maintenant</td>';
									break;
								case 3:
									echo '<td>Meilleure Offre</td>';
									break;
							}

							echo '<td>' . $elements["date_fin"] . '</td>';
							echo '<td>';
							echo '<h4>' . $elements["prix"] . '€</h4>';
							echo 'Ajouter au panier<button class="btn ml-4" style="border-radius: 15px; background-color: #6AD51A;"> <i class="fa fa-shopping-basket"></i> </button>';
							echo '</td>';
							echo '</tr>';
						}
						?>
						<!--
						<tr>
							<th scope="row"><img src="images/item/item2.jpg" width="80px" height="80px"></th>
							<td>Pièce</td>
							<td><input type="textarea" value="bon état"></td>
							<td>Ferraille ou trésor</td>
							<td>Enchère</td>
							<td>0h 3min 14s</td>
							<td>
								<h4>56€</h4>
								Ajouter au panier<button class="btn ml-4" style="border-radius: 15px; background-color: #6AD51A;"> <i class="fa fa-shopping-basket"></i> </button>
							</td>
						</tr>
						<tr>-->

					</tbody>
				</table>

			</div>
		</div>
	</div>




	<div class="container">

		<div class="row-width-max">

			<?php include('footer_client.php'); ?>

		</div>

	</div>

</body>

</html>