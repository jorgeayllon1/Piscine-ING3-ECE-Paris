<?php
	require "cookie.php";
	if (filesize("cookie.php") != 0)
	{
		header("location: admin_connexion.php");
	}
	if(C_RANG!='3')
	{
		header("location: admin_connexion.php");
	}
	else
	{
		header("location: compte_admin.php");
	}
?>