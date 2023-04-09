<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'Macskalak';
    try {
        $connection = new mysqli($servername, $username, $password, $dbname);
    }
    catch (Exception) {
        die("connection error");
    }

    if (isset($_GET['komment']) && !empty(trim($_GET['komment']))) {
        $index = $_GET['index'];
        $query = "INSERT INTO `kommentek`(value, postId, owner) 
        VALUES ('" . htmlspecialchars($_GET["komment"]) . "', $index, 'Valesz')";
        $connection -> query($query);
    }
?>