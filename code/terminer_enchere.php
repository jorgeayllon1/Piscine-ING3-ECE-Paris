<?php


if (isset($_POST["terminer"])) {

    echo "Tu parles de " . $_POST["id_item"] . " C'est ça ?";
}
else{
    echo "ERROR ";
}
