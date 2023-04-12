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

    $nyolcadikhiba = "";
    $siker = "";
    $destination = "";

    if (isset($_FILES["profilepic"])) {
        $allowed_file_extensions = ["jpg", "jpeg", "png"];

        $file_extension = strtolower(pathinfo($_FILES["profilepic"]["name"], PATHINFO_EXTENSION));

        if (in_array($file_extension, $allowed_file_extensions)) {
            if ($_FILES["profilepic"]["error"] === 0) {
                if ($_FILES["profilepic"]["size"] <= 26214400) {
                    $destination = "Kepek/Profilkep/" . $_FILES["profilepic"]["name"];
                    if (move_uploaded_file($_FILES["profilepic"]["tmp_name"], $destination)) {
                        $siker = "Sikeres fájlfeltöltés!";
                    } else {
                        $nyolcadikhiba = "notmoved";
                        $hibak = $hibak + 1;
                    }
                } else {
                    $nyolcadikhiba = "toobig";
                    $hibak = $hibak + 1;
                }
            } else {
                $nyolcadikhiba = "error";
                $hibak = $hibak + 1;
            }
        } else {
            $nyolcadikhiba = "bad_file_extension";
            $hibak = $hibak + 1;
        }
    }

    if (empty($nyolcadikhiba)) {
        $query = "UPDATE users
        SET profilepic = '$destination' 
        WHERE id = '$_SESSION[userID]'";
        $connection->query($query);
    }

    $connection->close();

?>