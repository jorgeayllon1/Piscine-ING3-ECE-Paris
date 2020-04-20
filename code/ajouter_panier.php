<?php

session_start();
$database = "ebayece";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


if (isset($_POST['ajouter_panier'])) {

    if ($db_found) {
        echo $_POST["id_item"];

        $sql =
            "SELECT * from lacollection
        WHERE id = '" . $_SESSION["id_user"] . "'";

        echo $sql;

        $resultat = mysqli_query($db_handle, $sql);

        $temp = "id_item_";

        while ($data = mysqli_fetch_assoc($resultat)) {
            for ($indice = 1; $indice <= 50; $indice++) {
                if ($data[$temp . $indice] == NULL) {
                    $lebonindice = $temp . $indice;
                    break;
                }
            }
        }
        $sql_ajout =
            "UPDATE lacollection
        SET " . $lebonindice . " = '" . $_POST["id_item"] . "'
        WHERE id = '" . $_SESSION["id_user"] . "'";

        echo $sql_ajout;
        mysqli_query($db_handle, $sql_ajout);

        header("location:page_achat.php");
    }
}
