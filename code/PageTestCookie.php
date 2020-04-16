<html>
	<head>
		<title>PageTestCookie</title>
		<meta charset="UTF-8">
		
	</head>
	<body>
		<h3>Bienvenue sur la page test du cookie</h3>

		<div class= "infoCompte">
			<?php
				require "cookie.php";
						if (filesize("cookie.php") != 0)
						{
							$database = "piscine_users";
							//connectez-vous dans votre BDD
							//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
							$db_handle = mysqli_connect('localhost', 'root', '');
							$db_found = mysqli_select_db($db_handle, $database);
							$id2=C_ID;
							$sql = "SELECT * FROM `users` WHERE ID LIKE '$id2'";
							$result = mysqli_query($db_handle, $sql);
							while ($data = mysqli_fetch_assoc($result)) {
								$c_ID = $data['ID'];
								print("<br>Votre ID est : ");
								print($c_ID);

								$c_nom = $data['Nom'];
								print("<br>Votre Nom est : ");
								print($c_nom);

								$c_mdp = $data['mdp'];

								$c_pays = $data['Pays'];
								print("<br>Votre pays est : ");
								print($c_pays);

								$c_rang = $data['rang'];
								print("<br>Votre rang est : ");
								print($c_rang);


							}
						}		
			?>

			
		</div>
		<br>
		<br>
		<form name ="form" method ="POST" action = "PageTestCookie.php">
			<input type = "submit" name = "deco" value = "Déconnexion">
		</form>
	</body>
</html>

<?php
	if(isset($_POST['deco']))
	{
		if ($_POST['deco']) {
			$fp = fopen('cookie.php', 'w');
			fclose($fp);
			header("location: LoginTest.php");
		}
	}
?>

