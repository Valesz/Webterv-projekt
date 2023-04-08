<?php
    if (isset($_GET['torles'])) {
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

        $query = "DELETE FROM `forum` WHERE id = " . $_GET['index'];
        $connection -> query($query);
    }
?>