<?php
session_start();

#Si le la valeur id_user existe dans le cookie, l'utilisateur s'est connecter
#Et si il s'est connecter, on peut le rediriger quelque part
if (isset($_SESSION["id_user"])) {

	if ($_SESSION["rang"] == 1) {
		header("location: compte_client.php");
	} else if ($_SESSION["rang"] == 2) {
		header("location:compte_vendeur.php");
	} else if ($_SESSION["rang"] == 3) {
		header("location:compte_admin.php");
	} else {
		echo "Error, pas compris le rang";
	}
}
#Sinon, on le renvoit à la page principale
else {
	header("location: accueil.php");
}


/*
require "cookie.php";
if (filesize("cookie.php") == 0) {
	header("location: connexion.php");
}
if (C_RANG == '1') {
	header("location: compte_client.php");
}
if (C_RANG == '2') {
	header("location: compte_vendeur.php");
}
if (C_RANG == '3') {
	header("location: compte_admin.php");
}
*/
