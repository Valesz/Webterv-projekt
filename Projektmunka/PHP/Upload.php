<?php
    $uploadErrorMessage = "";
    if (isset($_POST['feltoltes'])) {
        if (!empty(trim($_POST['name'])) && !empty(trim($_POST['description']))) {
            $targetDir = "Kepek/Adoptalos/";
            $targetFile = $targetDir . basename($_FILES["file"]['name']);
            $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            $upload = 1;

            while (file_exists($targetFile)) {
                $targetFile = $targetDir . pathinfo($targetFile, PATHINFO_FILENAME) . "1." . $fileType;
            }

            if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif") {
                $uploadErrorMessage = $uploadErrorMessage . "Nem megfelelő fájlformátum<br>";
                $upload = 0;
            }

            if ($upload === 1) {
                move_uploaded_file($_FILES['file']['tmp_name'], $targetFile);

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

                $query = "INSERT INTO forum (name, imgName, description)
                VALUES ('" . htmlspecialchars($_POST['name']) . "', '" . pathinfo($targetFile, PATHINFO_BASENAME) . "', '" .htmlspecialchars( $_POST['description']) . "')";
                $connection -> query($query);
            }
        } else {
            if (empty(trim($_POST['name']))) {
                $uploadErrorMessage = $uploadErrorMessage . "Adja meg a cica nevét!<br>";
            }
            if (empty(trim($_POST['description']))) {
                $uploadErrorMessage = $uploadErrorMessage . "Adja meg a cica leírását!<br>";
            }
            $fileType = strtolower(pathinfo(basename($_FILES['file']['name']), PATHINFO_EXTENSION));
            if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif") {
                $uploadErrorMessage = $uploadErrorMessage . "Nem megfelelő fájlformátum<br>";
            }
        }
    }
?>