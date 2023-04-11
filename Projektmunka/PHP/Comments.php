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
        if (!isset($_SESSION['userID'])) {
            header("location: Bejelentkezes.php");
        }

        $query = "SELECT * FROM users WHERE id = $_SESSION[userID]";
        $result = $connection->query($query);
        $uname = $result->fetch_assoc()['username'];

        $index = $_GET['index'];
        $query = "INSERT INTO `kommentek`(value, postId, owner) 
        VALUES ('" . htmlspecialchars($_GET["komment"]) . "', $index, '$uname')";
        $connection -> query($query);
    }
?>