<?php

session_start();

    $mail = $_POST["email_admin_inscription"];
    $prenom= $_POST["prenom_admin_inscription"];
    $nom = $_POST["nom_admin_inscription"];
    $pseudo= $_POST["pseudo_admin_inscription"];
    $rang = 2;
    $mdp = $_POST["mdp_admin_inscription"];
    $image = $_POST["vendeur_pdp"];
    $image_back = $_POST["vendeur_background"];

    if($mail=="" || $prenom=="" || $nom=="" || $pseudo=="" || $mdp=="" || $image=="" || $image_back=="")
    {
        echo'error ';
        header("location:compte_admin.php");
    }


$database = "ebayece";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

#Retourne l'id disponible dans la table user (il vaut l'id max + 1)
function trouver_id_dispo($db_handle)
{
    $sql =
        "SELECT max(id) from user";
    $result = mysqli_query($db_handle, $sql);

    while ($data = mysqli_fetch_assoc($result)) {
        $lemax = $data["max(id)"];
    }
    $lemax++;
    return $lemax;
}

#Ajoute la photo dans la table
function ajouter_photo($chemin, $db_handle, $id_item = NULL, $id_prop = NULL)
{
    $sql =
        "INSERT INTO photo
    VALUES(NULL,'" . $id_item . "','" . $id_prop . "','" . $chemin . "')";

    mysqli_query($db_handle, $sql);
}

function ajouter_vendeur($id_user, $email, $mdp, $pseudo, $nom, $prenom, $photo_perso, $photo_back, $db_handle)
{
    $sql =
        "INSERT INTO user
    VALUES('" . $id_user . "',NULL,
    NULL,'" . $id_user . "','" . $email . "','" . $mdp . "','" . $pseudo . "',2
    ,'" . $nom . "','" . $prenom . "','" . $photo_perso . "','" . $photo_back . "')";

    mysqli_query($db_handle, $sql);
}

#ajoute une ligne dans collection (mettre l'id_user et pas l'id_collection)
function ajouter_collection($id_user, $db_handle)
{
    $sql =
        "INSERT INTO lacollection
    VALUES ('" . $id_user . "', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL,
    NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 
    NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)";

    mysqli_query($db_handle, $sql);
}


if (isset($_POST["ajout_vendeur"])) {


    if ($db_found) {
        $sql = "SELECT * FROM `user` WHERE email LIKE '$mail'";
        $result = mysqli_query($db_handle, $sql);

        if (mysqli_num_rows($result) == 0) {
            #echo "Coder ici";
       
            $id = trouver_id_dispo($db_handle);


            #ajouter collection
            ajouter_collection(
                $id,
                $db_handle
            );


            #ajouter images
            #ajouter_photo($info_client["image"],$db_handle,NULL,$info_client["id"]);
            #ajouter_photo($info_client["image_back"],$db_handle,NULL,$info_client["id"]);

            #ajouter user
            ajouter_vendeur(
                $id,
                $mail,
                $mdp,
                $pseudo,
                $nom,
                $prenom,
                $image,
                $image_back,
                $db_handle
            );


            $_SESSION["id_user"] = $id;
            $_SESSION["rang"] = $rang;
            $_SESSION["nom"] = $nom;
            $_SESSION["prenom"] = $prenom;
            $_SESSION["id_collection"] = $id;
            $_SESSION["pseudo"] = $pseudo;
            $_SESSION["email"] = $mail;
            $_SESSION["photo_perso"] = $image;
            $_SESSION["photo_background"] = $image_back;
            $_SESSION["mdp"] = $mdp;

            #echo "arriver au session";
            header("location: accueil.php");
        } 
        else 
        {
            echo "Vous êtes deja dans la bdd";

            #header("location: inscription_client");
        }
    } 
    else 
    {
        echo "ERROR1";
    }
}
 else 
 {
    echo "ERROR2";
}
