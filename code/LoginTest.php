<?php
	//recuperer les données venant de la page HTML
	//identifier votre BDD
	$database = "piscine_users";
	//connectez-vous dans votre BDD
	//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);
	if ($_POST['submit']) {
		$prenom = $_POST["prenom"];
		$nom = $_POST["nom"];
		if ($db_found) {
			$sql = "SELECT * FROM `users` WHERE Nom LIKE '$nom' AND Pays LIKE '$prenom'" ;
			$result = mysqli_query($db_handle, $sql);
			if (mysqli_num_rows($result)==0)
			{
				echo "pas trouvé";
			}
			else
			{
				echo "trouvé";
			}
			
		}
	}
	mysqli_close($db_handle);

?>

<html>
	<head>
		<meta charset="UTF-8">
		<title>LoginTest</title>
	</head>
	<body>
		<form name ="form" method ="POST" action = "LoginTest.php">
			<input type = "text" name ="prenom">
			<input type = "text" name ="nom">
			<input type = "submit" name = "submit" value = "Se connecter">
		</form>
	</body>
</html>