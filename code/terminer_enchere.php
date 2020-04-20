<?php

#Lignes magiques
session_start();
$database = "ebayece";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

function enlever_item_dans_collection_pas_vainqueur($id_item, $id_vainqueur, $db_handle)
{

    $sql =
        "SELECT * from lacollection
        Where lacollection.id !=" . $id_vainqueur . "";

    $result = mysqli_query($db_handle, $sql);

    #echo $result;

    $recip = "id_item_";

    while ($data = mysqli_fetch_assoc($result)) {

        #print_r($data);

        for ($indice = 1; $indice <= 50; $indice++) {

            #echo $data[$recip.$indice];

            if ($data[$recip . $indice] == $id_item) {

                $sql_autre =
                    "UPDATE lacollection
                SET id_item_" . $indice . " = NULL
                WHERE lacollection.id=" . $data["id"] . "";

                #echo "CHEZ " . $data["id"] . " ON FAIT " . $sql_autre;
                mysqli_query($db_handle, $sql_autre);
                #break;
            }
        }
    }
}

function terminer_enchere($id_item, $db_handle)
{
    #Prendre item mettre type = 2
    #Ajouter le vainqueur de l'item
    #prix = prix_souh
    #retirer l'item dans les autres panier

    $sql_info =
        "SELECT id_vainqueur,prix_souh from les_items
    WHERE id=" . $id_item . "";

    $result = mysqli_query($db_handle, $sql_info);

    while ($data = mysqli_fetch_assoc($result)) {
        $id_vainqueur = $data["id_vainqueur"];
        $leprixfinal = $data["prix_souh"];
    }

    #echo $sql_info;

    $sql_maj_item =
        "UPDATE les_items
    SET type=2, prix = " . $leprixfinal . "
    WHERE id=" . $id_item . "";

    #echo $sql_maj_item;
    mysqli_query($db_handle, $sql_maj_item);

    enlever_item_dans_collection_pas_vainqueur($id_item, $id_vainqueur, $db_handle);
}

if (isset($_POST["terminer"])) {

    echo "Tu parles de " . $_POST["id_item"] . " C'est ça ?";
    terminer_enchere($_POST["id_item"], $db_handle);
    header("location:compte_admin.php");
} else {
    echo "ERROR ";
}
