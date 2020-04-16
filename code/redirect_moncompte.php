<?php
session_start();

if ($_SESSION["rang"] == 1) {
	header("location: compte_client.php");
}
if ($_SESSION["rang"] == 2) {
	header("location:compte_vendeur.php");
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
