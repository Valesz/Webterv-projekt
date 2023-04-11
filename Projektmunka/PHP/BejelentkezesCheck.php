<?php

    session_start();
    if (isset($_COOKIE['userID']) || isset($_SESSION['userID'])) {
        if (isset($_COOKIE['userID'])) {
            $_SESSION['userID'] = $_COOKIE['userID'];
        }
        header("location: Profil.php");
    }

    $usernameErrorMessage = "";
    $passwordErrorMessage = "";

    if (isset($_POST['submit-btn'])) {
        $givenUsername = trim($_POST['username']);
        $givenPassword = trim($_POST['password']);

        if (empty($givenUsername)) {
            $usernameErrorMessage = $usernameErrorMessage . "A felhasználónevet kötelező megadni!";
        }

        if (empty(trim($_POST['password']))) {
            $passwordErrorMessage = $passwordErrorMessage . "A jelszó mezőt kötelező kitölteni!";
        }

        if (!empty($givenUsername) && !empty(trim($_POST['password']))) {
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

            $query = "SELECT * FROM users WHERE username = '$givenUsername'";
            $result = $connection->query($query);
            $row = $result->fetch_assoc();
            if ($givenUsername === $row['username'] && password_verify($givenPassword, $row['password'])) {
                session_start();
                $_SESSION["userID"] = $row['id'];

                if ($_POST['remember_me']) {
                    setcookie("userID", $row['id'], time() + (60 * 60 * 24 * 30), "/");
                }

                header("location: Profil.php");
            } else {
                $query = "SELECT * FROM users WHERE username = '$givenUsername'";
                $result = $connection->query($query);
                if ($result -> num_rows == 0) {
                    $usernameErrorMessage = $usernameErrorMessage . "Helytelen felhasználónév!";
                } else {
                    $passwordErrorMessage = $passwordErrorMessage . "Helytelen jelszó!";
                }
            }
        }
    }

?>