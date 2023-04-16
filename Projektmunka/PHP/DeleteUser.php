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
    
    session_start();
    if ($_SESSION["userID"] != 1 || (isset($_GET["id"]) && $_GET["id"] != 1)) {
        $query = "SELECT kommentek.id FROM kommentek
            INNER JOIN users
            ON users.username = kommentek.owner
            WHERE users.id = $_GET[id]";
        $result = $connection->query($query);
        if ($result->num_rows > 0) {
            while ($kommentID = $result -> fetch_assoc()['id']) {
                $query = "DELETE FROM kommentek WHERE id = $kommentID";
                $connection->query($query);
            }
        }
        
        $query = "DELETE FROM users WHERE id = $_GET[id]";
        $connection->query($query);
        
        if ($_SESSION["userID"] != 1) {
            session_unset();
            session_destroy();
        }
    }
    header("location: ../index.php");
?>