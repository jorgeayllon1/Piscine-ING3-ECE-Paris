<?php

session_start();

            $prenom= $_POST["prenom_client_inscription"];
            $nom = $_POST["nom_client_inscription"];
            $pseudo = $_POST["pseudo_client_inscription"];
            $mail = $_POST["email_client_inscription"];
            $rang = 1;
            $mdp= $_POST["mdp_client_inscription"];
            $ad1= $_POST["ad1_client_inscription"];
            $ad2= $_POST["ad2_client_inscription"];
            $pays = $_POST["pays_client_inscription"];
            $ville= $_POST["ville_client_inscription"];
            $cp= $_POST["cp_client_inscription"];
            $phone= $_POST["phone_client_inscription"];
            $type_carte = $_POST["type_carte"];
            $paiement_nom= $_POST["paiement_nom"];
            $paiement_num_carte = $_POST["paiement_num_carte"];
            $paiement_date_expi= $_POST["paiement_date_expi"];
            $paiement_code= $_POST["paiement_code"];

            if($mail=="" || $prenom=="" || $nom=="" || $pseudo=="" || $mdp=="" || $ad1=="" || $ad2=="" ||
            $pays=="" || $ville=="" || $cp=="" || $phone=="" || $type_carte=="" || $paiement_nom=="" 
            || $paiement_num_carte=="" || $paiement_date_expi=="" || $paiement_code=="")
            {
                echo'error ';
                header("location:inscription_client.php");
            }


$database = "ebayece";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

#ajoute une ligne livraison (mettre l'id_user et pas l'id_livraison)
function ajouter_livraison($id_user, $num_tel, $adreese1, $adresse2, $ville, $codepostal, $pays, $db_handle)
{
    echo $id_user . ' ' . $num_tel . ' ' . $adreese1 . ' ' . $adresse2 . ' ' . $ville . ' ' . $codepostal . ' ' . $pays;
    #$id_user=mysqli_real_query($db_handle,$sql);
    $sql =
        "INSERT INTO coord_livraison
    Values('" . $id_user . "','" . $num_tel . "','" . $adreese1 . "','" . $adresse2 . "','" . $ville . "','" . $codepostal . "','" . $pays . "')";

    $result = mysqli_query($db_handle, $sql);
}
#ajoute une ligne info_bancaire (mettre l'id_user et pas l'id_bancaire)
function ajouter_bancaire($id_user, $num_carte, $type_carte, $nom_sur_carte, $date_expi, $code, $db_handle)
{
    $sql =
        "INSERT INTO info_bancaire
    Values('" . $id_user . "','" . $num_carte . "','" . $type_carte . "','" . $nom_sur_carte . "','" . $date_expi . "','" . $code . "')";

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

function ajouter_client($id_user, $email, $mdp, $pseudo, $nom, $prenom, $db_handle)
{
    $sql =
        "INSERT INTO user
    VALUES('" . $id_user . "','" . $id_user . "',
    '" . $id_user . "','" . $id_user . "','" . $email . "','" . $mdp . "','" . $pseudo . "',1
    ,'" . $nom . "','" . $prenom . "',NULL,NULL)";

    mysqli_query($db_handle, $sql);
}

if (isset($_POST['submit_client_inscription'])) {

    

    /*if ($mail = "") {
        header("location: inscription_client");
    }*/

    if ($db_found) {
        $sql = "SELECT * FROM `user` WHERE email LIKE '$mail'";
        $result = mysqli_query($db_handle, $sql);

        if (mysqli_num_rows($result) == 0) {
            #echo "Coder ici";

            
            $id = trouver_id_dispo($db_handle);

            #ajouter livraison
            ajouter_livraison(
                $id,
                $phone,
                $ad1,
                $ad2,
                $ville,
                $cp,
                $pays,
                $db_handle
            );
            #ajouter bancaire
            ajouter_bancaire(
                $id,
                $paiement_num_carte,
                $type_carte,
                $paiement_nom,
                $paiement_date_expi,
                $paiement_code,
                $db_handle
            );
            #ajouter collection
            ajouter_collection(
                $id,
                $db_handle
            );
            #ajouter user
            ajouter_client(
                $id,
                $mail,
                $mdp,
                $pseudo,
                $nom,
                $prenom,
                $db_handle
            );

            /**Stocker dans la session pour récup les infos dans mon compte */

            $_SESSION["id_user"] = $id;
            $_SESSION["rang"] = $rang;
            $_SESSION["nom"] = $nom;
            $_SESSION["prenom"] = $prenom;
            $_SESSION["id_collection"] = $id;
            $_SESSION["email"] = $mail;
            $_SESSION["pseudo"] = $pseudo;
            $_SESSION["mdp"] = $mdp;
            /** */
            $_SESSION["adresse1"] = $ad1;
            $_SESSION["adresse2"] = $ad2;
            $_SESSION["ville"] = $ville;
            $_SESSION["code_postal"] = $cp;
            $_SESSION["pays"] = $pays;
            $_SESSION["num_tel"] = $phone;
            /** */
            $_SESSION["num_carte"] = $paiement_num_carte;
            $_SESSION["type"] = $type_carte;
            $_SESSION["nom_sur_carte"] = $paiement_nom;
            $_SESSION["date_expi"] = $paiement_date_expi;
            $_SESSION["code"] = $paiement_code;


            header("location: accueil.php");
        } 
        else 
        {
            echo "Vous êtes deja dans la bdd";

           
        }
    }
}
