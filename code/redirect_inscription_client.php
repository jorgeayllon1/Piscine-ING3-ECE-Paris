<?php

$database = "ebayece";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


if (isset($_POST['submit'])) {
    #Rajouter les pseudo, id bancaire, livraison
    $mdp = $_POST["mdp_inscription"];
    $mail = $_POST["email_inscription"];
    $prenom=$_POST["prenom_inscription"];
    $nom=$_POST["nom_inscription"];
    if ($db_found) {
        $sql = "SELECT * FROM `user` WHERE email LIKE '$mail' AND mdp LIKE '$mdp'";
        $result = mysqli_query($db_handle, $sql);

        if (mysqli_num_rows($result) != 0) {
            echo "Vous ete deja dans la bdd";
        } else {
            echo "Vous êtes pas dans la bdd";

            #header("location: accueil.php");
        }
    }
}
