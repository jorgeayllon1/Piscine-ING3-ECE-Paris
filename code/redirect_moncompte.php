<?php
session_start();

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
} else {
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
