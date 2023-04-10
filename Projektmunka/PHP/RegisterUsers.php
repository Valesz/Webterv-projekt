<?php

    $elsohiba = "";
    $masodikhiba = "";
    $harmadikhiba = "";
    $negyedikhiba = "";
    $sikeres = NULL;
    $hibak = 0;

    if (isset($_POST["register"])) {

        // kapcsolat letrehozasa
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
        
        // felhasznalonev - check
        if (!empty(trim($_POST["username"]))) {
            $felhasznalonev = trim($_POST["username"]);
            $query = "SELECT username FROM users WHERE username = '$felhasznalonev'";
            $result = $connection -> query($query);
            if (strlen($felhasznalonev) < 4) {
                $elsohiba = "short";
                $hibak = $hibak + 1;
            } else if (strlen($felhasznalonev) > 100) {
                $elsohiba = "toolong";
                $hibak = $hibak + 1;
            } else if ($result -> num_rows > 0) {
                $elsohiba = "used";
                $hibak = $hibak + 1;
            }
        } else {
            $hibak = $hibak + 1;
        }

        // email - check
        if (!empty(trim($_POST["email"]))) {
            $email = trim($_POST["email"]);
            $query = "SELECT email FROM users WHERE email = '$email'";
            $result = $connection -> query($query);
            if (count($array = explode("@", $email)) != 2 || count(explode(".", $array[1])) < 2) {
                $masodikhiba = "badformat";
                $hibak = $hibak + 1;
            } else if ($result -> num_rows > 0) {
                $masodikhiba = "used";
                $hibak = $hibak + 1;
            }
        } else {
            $hibak = $hibak + 1;
        }

        // jelszo - check
        if (!empty(trim($_POST["password"]))) {
            $jelszo = trim($_POST["password"]);
            if (strlen($jelszo) < 8) {
                $harmadikhiba = "eightchar";
                $hibak = $hibak + 1;
            } else if (strlen($jelszo) > 100) {
                $harmadikhiba = "toolong";
                $hibak = $hibak + 1;
            } else if (strtolower($jelszo) === $jelszo) {
                $harmadikhiba = $harmadikhiba . "nouppercase";
                $hibak = $hibak + 1;
            }
        } else {
            $hibak = $hibak + 1;
        }

        // jelszo es jelszo ujra - check
        if (!empty(trim($_POST["password-again"]))) {
            $jelszoujra = trim($_POST["password-again"]);
            if ($jelszo !== $jelszoujra) {
                $negyedikhiba = "notequals";
                $hibak = $hibak + 1;
            }
        } else {
            $hibak = $hibak + 1;
        }

        // jelszó hash-elés
        $jelszo = password_hash($jelszo, PASSWORD_DEFAULT);

        // felvetel adatbazisba vagy nem, ha nem sikeres a regisztacio
        if (empty($hibak)) {
            $query = "INSERT INTO users (username, email, password)
            VALUES ('$felhasznalonev', '$email', '$jelszo')";
            $connection->query($query);
            $sikeres = TRUE;
            header("Location: Bejelentkezes.php");
        } else {
            $sikeres = FALSE;
        }

        $connection->close();
    }
?>
