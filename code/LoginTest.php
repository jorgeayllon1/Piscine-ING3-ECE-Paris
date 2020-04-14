

<html>
	<head>
		<meta charset="UTF-8">
		<title>LoginTest</title>
	</head>
	<body>
		<form name ="form" method ="POST" action = "LoginTest.php">
			Nom :
			<input type = "text" name ="nom"><br>
			Mot de passe :
			<input type="password" name="mdp"<br>
			<input type = "submit" name = "submit" value = "Se connecter">
		</form>
	</body>
</html>

<?php
	$database = "piscine_users";
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);
	if(isset($_POST['submit']))
	{
		if ($_POST['submit']) {
			$mdp = $_POST["mdp"];
			$nom = $_POST["nom"];
			if ($db_found) {
				$sql = "SELECT * FROM `users` WHERE Nom LIKE '$nom' AND mdp LIKE '$mdp'" ;
				$result = mysqli_query($db_handle, $sql);
				if (mysqli_num_rows($result)==0)
				{
					echo "pas trouvé";
				}
				else
				{
					echo "trouvé";
					while ($data = mysqli_fetch_assoc($result)) {
						$c_ID = $data['ID'];
						$c_nom = $data['Nom'];
						$c_mdp = $data['mdp'];
						$c_pays = $data['Pays'];
						$c_rang = $data['rang'];
						$fp = fopen('cookie.php', 'w');

						fwrite($fp, "<?php 
							define('C_ID', '$c_ID'); 
        	        		define('C_PAYS', '$c_pays');
        	        	?>");
						fclose($fp);
        	        	header("location: PageTestCookie.php");
        	        	
					}
				}
				
			}
		}
	}
	
	mysqli_close($db_handle);
?>