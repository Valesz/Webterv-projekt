<?php

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

            $query = "SELECT * FROM users WHERE username = '$givenUsername' AND password = '$givenPassword'";
            $result = $connection->query($query);
            if ($result -> num_rows == 1) {
                session_start();
                $_SESSION["userID"] = $result->fetch_assoc()['id'];

                if ($_POST['remember_me']) {
                    
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