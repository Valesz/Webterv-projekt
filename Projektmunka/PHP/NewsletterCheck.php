<?php

    // kapcsolat létrehozása

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

    $hibak = 0;
    $emailhiba = "";
    $email = "";

    // email - check

    if (isset($_POST["nl_submit_btn"])) {
        if (!empty(trim($_POST["emailfornewsletter"]))) {
            $email = trim($_POST["emailfornewsletter"]);
            $query = "SELECT email FROM hirlevel WHERE email = '$email'";
            $result = $connection -> query($query);
            if (count($array = explode("@", $email)) != 2 || count(explode(".", $array[1])) < 2) {
                $emailhiba = "badformat";
                $hibak = 1;
            } else if ($result -> num_rows > 0) {
                $emailhiba = "used";
                $hibak = 1;
            }
        } else {
            $hibak = 1;
        }

        // felvétel adatbázisba, vagy nem

        if ($hibak === 0) {
            $query = "INSERT INTO hirlevel
            VALUES ('$email')";
            $connection->query($query);
        }
    }

    $connection->close();
?>