<?php

    session_start();

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

    // lekérdezések
    $uname = "Felhasználó";
    $email = "";
    $pword = "";
    $pwordagain = "";
    $favqoute = "";
    $userID = "";

    if (isset($_SESSION["userID"])) {
        $query = "SELECT * FROM users WHERE id = $_SESSION[userID]";
        $result = $connection->query($query);
        $array = $result->fetch_assoc();
        $userID = $array["id"];
        $uname = $array["username"];
        $email = $array["email"];
        $pword = $array["password"];
        $birthday = $array["birthday"];
        $favqoute = $array["favquote"];
    }

    // módosítások

    $elsohiba = "";
    $masodikhiba = "";
    $harmadikhiba = "";
    $negyedikhiba = "";
    $otodikhiba = "";
    $hatodikhiba = "";
    $hibak = 0;

    if (isset($_POST["change"])) {
        // felhasznalonev - check
        if (!empty(trim($_POST["username"]))) {
            $uname = trim($_POST["username"]);
            $query = "SELECT username FROM users WHERE username = '$uname'";
            $result = $connection -> query($query);
            if (strlen($uname) < 4) {
                $elsohiba = "short";
                $hibak = $hibak + 1;
            } else if (strlen($uname) > 100) {
                $elsohiba = "toolong";
                $hibak = $hibak + 1;
            } else if ($result -> num_rows > 0) {
                $elsohiba = "used";
                $hibak = $hibak + 1;
            }
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
        }

        // jelszo - check
        if (!empty(trim($_POST["password"]))) {
            $pword = trim($_POST["password"]);
            if (strlen($pword) < 8) {
                $harmadikhiba = "eightchar";
                $hibak = $hibak + 1;
            } else if (strlen($pword) > 100) {
                $harmadikhiba = "toolong";
                $hibak = $hibak + 1;
            } else if (strtolower($pword) === $pword) {
                $harmadikhiba = $harmadikhiba . "nouppercase";
                $hibak = $hibak + 1;
            }
        }

        // jelszo es jelszo ujra - check
        if (!empty(trim($_POST["password-again"]))) {
            $pwordagain = trim($_POST["password-again"]);
            if ($pword !== $pwordagain) {
                $negyedikhiba = "notequals";
                $hibak = $hibak + 1;
            }
        }
        
        // jelszó hash-elés
        $pword = password_hash($pword, PASSWORD_DEFAULT);

        // szulinap - check
        if (!empty(trim($_POST["birthdate"]))) {
            $birthday = trim($_POST["birthdate"]);
            $array = explode("-", $birthday);
            if (count($array) !== 3 || strlen($array[0]) !== 4 || strlen($array[1]) !== 2 || strlen($array[2]) !== 2 
                || !is_numeric($array[0]) || !is_numeric($array[1]) || !is_numeric($array[2]) 
                || intval($array[1]) > 12 || intval($array[2]) > 31 || intval($array[1]) === 0 || intval($array[2]) == 0) {
                $otodikhiba = "badformat";
                $hibak = $hibak + 1;
            }
        }

        // kedvenc idezet - check
        if (!empty(trim($_POST["favquote"]))) {
            $favqoute = trim($_POST["favquote"]);
            if (strlen($favqoute) > 250) {
                $hatodikhiba = "toolong";
                $hibak = $hibak + 1;
            }
        }
        
        // felvetel adatbazisba vagy nem
        if ($hibak === 0) {
            $query = "UPDATE users 
            SET username = '$uname', 
            email = '$email',
            birthday = '$birthday',
            password = '$pword',
            favquote = '$favqoute'
            WHERE id = '$userID'";
            $connection->query($query);
            header("Location: Profil.php");
        }
        
    }
    
    if (isset($_SESSION["userID"])) {
        $query = "SELECT * FROM users WHERE id = $_SESSION[userID]";
        $result = $connection->query($query);
        $array = $result->fetch_assoc();
        $userID = $array["id"];
        $uname = $array["username"];
        $email = $array["email"];
        $pword = $array["password"];
        $birthday = $array["birthday"];
        $favqoute = $array["favquote"];
    }

    $connection -> close();
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Macskalak</title>
    <link rel="stylesheet" href="CSS/navBar.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/profil.css">
    <link rel="icon" type="image/x-icon" href="kepek/cat.png">
</head>
<body>

    <nav>
        <ul>
            <li><a href="Profil.php" class="gomb active">Profil</a></li>
            <li><a href="Rolunk.php" class="gomb">Támogatás</a></li>
            <li><a href="Forum.php" class="gomb">Fórum</a></li>
            <li><a href="index.php" class="gomb">Kezdőlap</a></li>
            <li class="icon-img-container"><a href="index.php"><img src="Kepek/cat.png" class="icon-img" alt="Logo"></a></li>
        </ul>
    </nav>

    <main>

        <h1>Profilod</h1>
        <hr>
        <br>
        
        <div class="card_mod">
            <div class="profile_pic"><img src="Kepek/Ikonok/morcoscica.jpg" alt="morcoscica" class="profile_pic"></div>
            <form method="POST">
                <table>
                    <tr>
                        <th id="corner"></th>
                        <th id="adatok">Adatok</th>
                        <th>Legyen publikus</th>
                    </tr>
                    <tr>
                        <th id="felhasznalonev">Felhasználónév:</th>
                        <td headers="felhasznalonev"><input type="text" name="username" placeholder=<?php echo $uname;?>></td>
                        <td><input type="checkbox" id="checkbox" name="felhasznalonev-cb" disabled></td>

                    </tr>
                    <tr>
                        <th id="orok-cicaid">E-mail címed:</th>
                        <td headers="orok-cicaid"><input type="text" name="email" placeholder=<?php echo $email;?>></td>
                        <td><input type="checkbox" id="checkbox" name="email-cb"></td>
                    </tr>
                    <tr>
                        <th id="jelszavad">Jelszavad:</th>
                        <td headers="jelszavad"><input type="password" name="password"></td>
                        <td><input type="checkbox" id="checkbox" name="jelszo-cb" disabled></td>
                    </tr>
                    <tr>
                        <th id="jelszavad">Jelszavad újra:</th>
                        <td headers="jelszavad"><input type="password" name="password-again"></td>
                        <td><input type="checkbox" id="checkbox" name="jelszo-again-cb" disabled></td>
                    </tr>        
                    <tr>
                        <th id="szulinap">Szülinap:</th>
                        <td headers="szulinap"><input type="text" id="birthdate" name="birthdate" maxlength="10" placeholder="2000-01-01"></td>
                        <td><input type="checkbox" id="checkbox" name="szulinap-cb"></td>
                    </tr>
                    <tr>
                        <th id="reg-ido">Kedvenc idézeted:</th>
                        <td headers="reg-ido"><input type="text" name="favquote" placeholder="max. 250 karakter"></td>
                        <td><input type="checkbox" id="checkbox" name="favquote-cb"></td>
                    </tr>
                </table>
                <?php
                    if ($elsohiba === "short") {
                        echo "<p class='errormessage'>A felhasználónévnek legalább 4 karakterből kell állnia!</p>";
                    }
                    if ($elsohiba === "toolong") {
                        echo "<p class='errormessage'>A felhasználónév legfeljebb 35 karakterből állhat!</p>";
                    }
                    if ($elsohiba === "used") {
                        echo "<p class='errormessage'>A felhasználónév foglalt!</p>";
                    }
                    if ($masodikhiba === "badformat") {
                        echo "<p class='errormessage'>Az email cím nem megfelelő formátumú!</p>";
                    }
                    if ($masodikhiba === "used") {
                        echo "<p class='errormessage'>Ezzel az email címmel már regisztráltak!</p>";
                    }
                    if ($harmadikhiba === "eightchar") {
                        echo "<p class='errormessage'>A jelszónak legalább 8 karakterből kell állnia!</p>";
                    }
                    if ($harmadikhiba === "toolong") {
                        echo "<p class='errormessage'>A jelszó legfeljebb 100 karakter lehet!</p>";
                    }
                    if ($harmadikhiba === "nouppercase") {
                        echo "<p class='errormessage'>A jelszónak tartalmaznia kell nagybetűt!</p>";
                    }
                    if ($negyedikhiba === "notequals") {
                        echo "<p class='errormessage'>A jelszavak nem egyeznek!</p>";
                    }
                    if ($otodikhiba === "badformat") {
                        echo "<p class='errormessage'>A születésnap nem megfelelő formátumú!</p>";
                    }
                    if ($hatodikhiba === "toolong") {
                        echo "<p class='errormessage'>A kedvenc idézeted max 250 karakter lehet!</p>";
                    }
                ?>
                <label for="change">
                    <input type="submit" name="change" id="change" value="Változtatok!">
                </label>
            </form>    
            <br>
        </div>

    </main>

    <footer>
        <div>
            <h1>Elérhetőségeink:</h1>
            <p>Tel: +3630 123 4567</p>
            <p>Email: info@macskalak.hu</p>
            <p>Facebook: Macskalak</p>
            <p>Instagram: Macskalak</p>
            <p>Telephely: Macsköztársaság, Kaparófalva, Miautca 12(cicenkettő).</p>
            <form class="footer_form">
                <h1>Iratkozz fel hírlevelünkre a funtasztikus cicás hírekért!</h1>
                <input type="email" name="emailfornewsletter" placeholder="valaki@email.com" required>
                <input type="submit" name="nl_submit_btn" value="Miau!">
            </form>
        </div>
        <p class="copyright"><sup>©</sup> 2023 Macskalak</p>
    </footer>
    
</body>
</html>