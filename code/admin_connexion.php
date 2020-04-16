<?php
	$database = "ebayece";
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);
	if(isset($_POST['submit']))
	{
		if ($_POST['submit']) {
			$mdp = $_POST["mdp"];
			$mail = $_POST["mail"];
			if ($db_found) {
				$sql = "SELECT * FROM `user` WHERE rang LIKE '3' AND email LIKE '$mail' AND mdp LIKE '$mdp'" ;
				$result = mysqli_query($db_handle, $sql);
				if (mysqli_num_rows($result)==0)
				{
					//echo "Erreur, veuillez vérifier vos informations de connexion.";
				}
				else
				{
					echo "trouvé";
					while ($data = mysqli_fetch_assoc($result)) {
						$c_ID = $data['id'];
						$c_rang = $data['rang'];
						$fp = fopen('cookie.php', 'w');

						/*fwrite($fp, "const C_ID = '$c_ID'
							const C_NOM = '$c_nom'
							const C_PAYS = '$c_pays'"); JAVASCRIPT*/
						fwrite($fp, "<?php 
							define('C_ID', '$c_ID'); 
							define('C_RANG', '$c_rang');
        	        	?>"); 
						fclose($fp);
        	        	header("location: accueil.php");
        	        	
					}
				}
				
			}
		}
	}
	
	mysqli_close($db_handle);
?>






<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Connexion Admin</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="piscine.css">
	    
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	    <!--<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />-->


        	    
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	    <script src="https://use.fontawesome.com/53fe4ef42f.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>  <!--include popper.js-->
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.sticky/1.0.4/jquery.sticky.js"></script>
	    <script src="accueil.js" type="text/javascript"></script> 
	    
		
	</head>
	<body>

		<div class="container">
			
				<div class="row d-flex justify-content-center items-align-center">		
				   <div class="col-lg-12">


			<nav class="navbar d-flex justify-content-center items-align-center navbar-admin ">
		        <a class="navbar-brand" href="accueil.php"><img src="images/logo-admin.png" width="40%"></a>
		       
	        </nav>
	        </div>
       </div>
       </div>
       <br>

       <!----------------------------------------->
			
		

		<div class="container">

			<div class="back-admin w-100">
			<div class="row">

				

				<div class="col-md-5 ">
						  
						<form class="text-center border border-light p-2 form-vendeur" action="admin_connexion.php" form="post"  style="background-color: #fff; " method="POST" > <!--PHP-->

						    <p class="h4 mb-4">Se connecter</p>

						    

						  

						    
						    <input type="email" id="email_admin_connexion" class="form-control mb-3" placeholder="E-mail" name="mail">

						    <!-- Password -->
						    <input type="password" id="mdp_admin_connexion" class="form-control" placeholder="Mot De Passe" aria-describedby="defaultRegisterFormPasswordHelpBlock" name="mdp">
						    <small id="mdp_admin_connexion" class="form-text text-muted mb-4">
						        Au moins 8 caractères et un chiffre

						    </small>

						    

				


						   

						   

						    <!-- Sign up button -->
						    <input name="submit" class="btn my-3 " style="background: #67E514; border:none; color:#fff;" type="submit" value="Se connecter">

						    <!-- Social register -->
						    <p>ou avec:</p>

						    <a href="#" class="mx-2" role="button"><i class="fa fa-facebook-f light-blue-text"></i></a>
						    <a href="#" class="mx-2" role="button"><i class="fa fa-linkedin-in light-blue-text"></i></a>
						    <a href="#" class="mx-2" role="button"><i class="fa fa-github light-blue-text"></i></a>

							<hr>
							
							<p>Pas encore inscrit ? Inscrivez-vous</p>
							<a href="inscription_client.php">S'inscrire</a>

						   

						</form>
					
			
		
                </div>

                

               

                

            </div>
        </div>

        </div>



 <div class="container">
 	<div class="row-width-max">
		<?php include('footer_admin.php'); ?>
 	</div>
 </div>


	</body>
</html>