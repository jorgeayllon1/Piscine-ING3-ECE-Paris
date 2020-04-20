<?php

session_start();

$database = "ebayece";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


function ajouter_item($id, $id_prop, $nom, $description, $prix, $video, $categorie, $type, $date_debut, $date_fin, $db_handle)
{
    $sql =
        "INSERT INTO les_items
    VALUES('" . $id . "','" . $id_prop . "','" . $nom . "','" . $description . "',
    '" . $prix . "',NULL,'" . $video . "','" . $categorie . "','" . $type . "','" . $date_debut . "','" . $date_fin . "',NULL,5)";

    mysqli_query($db_handle, $sql);
}

function trouver_id_panier_dispo($id_panier, $db_handle)
{
    $sql =
        "SELECT * from lacollection
        WHERE lacollection.id=$id_panier";

    $recip = "id_item_";

    $result = mysqli_query($db_handle, $sql);

    while ($data = mysqli_fetch_assoc($result)) {
        for ($indice = 1; $indice <= 50; $indice++) {
            if (!$data[$recip . strval($indice)]) {
                return $indice;
            }
        }
    }
    return false;
}

#Envoyer $_SESSION dans le $_id
function ajouter_item_dans_panier($id_user, $id_dispo, $id_item, $db_handle)
{
    #On rajoute les bonnes valeurs aux bonnes colonnes
    #On evite toutes les colonnes qui auront la valeur = NULL

    $temp = "id_item_" . $id_dispo;

    $sql =
        "UPDATE lacollection
        SET " . $temp . " = '" . $id_item . "'
        WHERE lacollection.id = '" . $id_user . "'";

    #echo "\n" . $sql . "\n";

    mysqli_query($db_handle, $sql);
}


function ajouter_photo($chemin, $db_handle, $id_item)
{
    $sql =
        "INSERT INTO photo
    VALUES(NULL,'" . $id_item . "','" . $chemin . "')";

    echo "\n" . $sql . "\n";

    mysqli_query($db_handle, $sql);
}

function id_item_max($db_handle)
{
    $sql =
        "SELECT max(id) from les_items";

    $result = mysqli_query($db_handle, $sql);

    while ($data = mysqli_fetch_assoc($result)) {
        $lemax = $data["max(id)"];
    }
    $lemax++;

    return $lemax;
}

date_default_timezone_set('UTC');

$date = date("d/m/Y");
$date_apre = strtotime(date("d-m-Y", strtotime($date)) . " +1 day");

if (isset($_POST['ajouter_item_vendeur'])) {
    if ($db_found) {
        #$litem["id"]=NULL;
        $litem["id_prop"] = $_SESSION["id_user"];
        $litem["nom"] = $_POST["ajout_nom"];
        $litem["description"] = $_POST["ajout_description"];
        $litem["prix"] = $_POST["ajout_prix"];
        #$litem["prix_souh"]=NULL;
        $litem["image"] = $_POST["ajout_image"];
        $litem["video"] = $_POST["ajout_video"];
        $litem["categorie"] = $_POST["ajout_categorie"];
        #changer le type de l'item
        $litem["type"] = $_POST["ajout_type"];
        $litem["date_debut"] = $date;
        $litem["date_fin"] = $date_apre;

        foreach ($litem as $elements) {
            if ($elements == "") {
                echo "erreur";
                header("location: compte_vendeur");
            } else {
                echo $elements;
            }
        }
        $litem["id"] = id_item_max($db_handle);

        $litem["id_dans_collection"] = trouver_id_panier_dispo($_SESSION["id_user"], $db_handle);

        #Ajouter item dans collection
        ajouter_item_dans_panier(
            $_SESSION["id_user"],
            $litem["id_dans_collection"],
            $litem["id"],
            $db_handle
        );

        #Ajouter l'item dans la table item
        ajouter_item(
            $litem["id"],
            $litem["id_prop"],
            $litem["nom"],
            $litem["description"],
            $litem["prix"],
            $litem["video"],
            $litem["categorie"],
            $litem["type"],
            $date,
            $date_apre,
            $db_handle
        );

        #Ajouter la photo de l'item
        ajouter_photo($litem["image"], $db_handle, $litem["id"]);

        header("location: compte_vendeur.php");

        echo "Salut aventurier";
    }
} else {
    echo "ERROR";
}
