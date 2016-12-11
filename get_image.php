<?php
    header("Content-type: image/jpg");

    // connect to server and select database
    $db = new mysqli(
        "eu-cdbr-azure-west-a.cloudapp.net",
        "bd2505ec24d031",
        "a0a7a671",
        "goportlethendb"
    );
    // test if connection was established, and print any errors
    if ($db->connect_errno) {
        die('Connectfailed[' . $db->connect_error . ']');
    }

    $mediaID = $_GET['mediaID'];
    $query = "SELECT mediaFile FROM media WHERE mediaID = '$mediaID';";
    $result = $db->query($query);
    $row = $result->fetch_array();
    $image = $row['mediaFile'];
    echo $image;
?>