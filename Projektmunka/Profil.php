<?php
    include "PHP/RegisterUsers.php";
    
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

    $uname = "Felhasználó";
    $email = "";
    $password = "";
    $userID = -1;

    if (isset($_SESSION["userID"])) {
        $query = "SELECT * FROM users WHERE id = $_SESSION[userID]";
        $result = $connection->query($query);
        $array = $result->fetch_assoc();
        $userID = $array["id"];
        $uname = $array["username"];
        $email = $array["email"];
        $password = $array["password"];
        $birthday = $array["birthday"];
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
        
        <div class="card">
            <div class="profile_pic"><img src="Kepek/Ikonok/morcoscica.jpg" alt="morcoscica" class="profile_pic"></div>
            <h2>
                <?php
                    echo $uname;
                ?>
            </h2>
            <table>
                <tr>
                    <th id="reg-ido">Ennyi ideje vagy tag:</th>
                    <td headers="reg-ido">

                    </td>
                </tr>
                <tr>
                    <th id="szulinap">Szülinap:</th>
                    <td headers="szulinap">
                    <?php 
                        if (isset($birthday)) {
                            echo "$birthday";
                        } else {
                            echo "Nincs beállítva a születésnapod!";
                        }
                    ?>
                    </td>
                </tr>
                <tr>
                    <th id="orok-cicaid">E-mail címed:</th>
                    <td headers="orok-cicaid">
                    <?php 
                        echo "Nincs beállítva az email-címed!";
                    ?>
                    </td>
                </tr>
                <tr>
                    <th id="legutolso-belepes">Jelszavad:</th>
                    <td headers="legutolso-belepes">
                    <?php 
                        if (isset($password)) {
                            echo $password;
                        } else {
                            echo "";
                        }
                    ?>
                    </td>
                </tr>    
            </table>
            <input type="submit" name="change" id="change" onclick="window.location.href='ProfilModositas.php'" value="Módosítás">
            <br>
            <p class="quote"><em><q>A macska oroszlán a kis bokrok dzsungelében.</q></em></p> <br> <p class="proverb"><em>- Közmondás</em></p>
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