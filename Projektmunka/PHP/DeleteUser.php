<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Macskalak";
    try {
        $connection = new mysqli($servername, $username, $password, $dbname);
    }
    catch (Exception) {
        die("connection error");
    }

    $query = "DELETE FROM users WHERE id = $_GET[id]";
    $connection->query($query);
    session_start();
    if ($_SESSION["userID"] != 1) {

        session_unset();
        session_destroy();
    }
    header("location: ../index.php");
?>