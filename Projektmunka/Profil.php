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
    $pword = "";
    $userID = "";
    $birthday = "";
    $registerTime = "";
    $favquote = "";
    $favcat = "";

    $emailVisibility = "";
    $birthdayVisibility = "";
    $favcatVisibility = "";
    $favquoteVisibility = "";

    $profilepic = "";

    if (isset($_GET['profilOpen'])) {
        $query = "SELECT * FROM users WHERE id = $_GET[userId]";
        $result = $connection->query($query);
        $array = $result->fetch_assoc();
        $userID = $array["id"];
        $uname = $array["username"];
        $email = $array["email"];
        $pword = $array["password"];
        $birthday = $array["birthday"];
        $favquote = $array["favquote"];
        $registerTime = $array["registerTime"];
        $profilepic = $array["profilepic"]; 
        $emailVisibility = $array["emailVisibility"];
        $birthdayVisibility = $array["birthdayVisibility"];
        $favcatVisibility = $array["favcatVisibility"];
        $favquoteVisibility = $array["favquoteVisibility"];
    }
    else if (isset($_SESSION["userID"])) {
        $query = "SELECT * FROM users WHERE id = $_SESSION[userID]";
        $result = $connection->query($query);
        $array = $result->fetch_assoc();
        $userID = $array["id"];
        $uname = $array["username"];
        $email = $array["email"];
        $pword = $array["password"];
        $birthday = $array["birthday"];
        $favquote = $array["favquote"];
        $registerTime = $array["registerTime"];
        $favcat = $array["favcat"];
        $profilepic = $array["profilepic"];
        $emailVisibility = $array["emailVisibility"];
        $birthdayVisibility = $array["birthdayVisibility"];
        $favcatVisibility = $array["favcatVisibility"];
        $favquoteVisibility = $array["favquoteVisibility"];
    } else {
        header("location: index.php");
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
            <div class="profile_pic"><img src="<?php if (!empty($profilepic)) {echo $profilepic;} else { echo "Kepek/Ikonok/morcoscica.jpg"; }?>" alt="profilkép" class="profile_pic"></div>
            <h2>
                <?php
                    echo $uname;
                    ?>
            </h2>
            <table>
                <tr>
                    <th id="corner"></th>
                    <th id="adatok">Adatok</th>
                    <?php
                        if (!isset($_GET["userId"]) || (isset($_SESSION["userID"]) && $_GET["userId"] === $_SESSION["userID"])) {
                            echo "<th id='visibility'>Láthatóság</th>";
                        }
                    ?>
                </tr>
                <tr>
                    <?php
                        if ((isset($_SESSION["userID"]) && !isset($_GET["userId"])) || (isset($_GET["userId"]) && $favcatVisibility === "TRUE") || (isset($_SESSION["userID"]) && $_GET["userId"] === $_SESSION["userID"])) {
                            echo
                            "<th id='favcat'>Kedvenc cicám:</th>
                            <td headers='favcat'>";
                            if ($favcatVisibility === "TRUE" && isset($favcat) && $favcat !== "") {
                                echo "$favcat</td>";
                            } else {
                                echo "Nincs kedvenc cicám, mindegyik cuki! :3</td>";
                            }
                        }
                        if (!isset($_GET["userId"]) && isset($_SESSION["userID"]) || (isset($_SESSION["userID"]) && $_GET["userId"] === $_SESSION["userID"])) {
                            echo "<td><input type='checkbox' id='checkbox0' name='kedvenccica-cb' disabled ";
                        }    
                        if (!isset($_GET["userId"]) && isset($_SESSION["userID"]) && $favcatVisibility === "TRUE") {
                            echo "checked></td>";
                        } else if (!isset($_GET["userId"]) && isset($_SESSION["userID"])) {
                            echo "></td>";
                        }   
                    ?>    
                </tr>
                <tr>
                    <?php
                        if ((isset($_SESSION["userID"]) && !isset($_GET["userId"])) || (isset($_GET["userId"]) && $birthdayVisibility === "TRUE") || (isset($_SESSION["userID"]) && $_GET["userId"] === $_SESSION["userID"])) {
                            echo
                            "<th id='szulinap'>Szülinapom:</th>
                            <td headers='szulinap'>";
                            if (isset($birthday) && $birthday !== "") {
                                echo "$birthday</td>";
                            } else {
                                echo "Nincs beállítva a születésnapod!</td>";
                            }
                        }
                        if (!isset($_GET["userId"]) || (isset($_SESSION["userID"]) && $_GET["userId"] === $_SESSION["userID"])) {
                            echo "<td><input type='checkbox' id='checkbox1' name='szulinap-cb' disabled ";
                        }
                        if (!isset($_GET["userId"]) && $birthdayVisibility === "TRUE") {
                            echo "checked></td>";
                        } else if (!isset($_GET["userId"])) {
                            echo "></td>";
                        }  
                    ?>   
                </tr>
                <tr>
                    <?php
                        if (($emailVisibility === "TRUE" && isset($_GET["userId"])) || (isset($_SESSION["userID"]) && !isset($_GET["userId"])) || (isset($_SESSION["userID"]) && $_GET["userId"] === $_SESSION["userID"])) {
                            echo
                            "<th id='emailcimed'>E-mail címem:</th>
                            <td headers='emailcimed'>$email</td>";
                        }
                        if (!isset($_GET["userId"]) || (isset($_SESSION["userID"]) && $_GET["userId"] === $_SESSION["userID"])) {
                            echo "<td><input type='checkbox' id='checkbox2' name='emailcimem' disabled ";
                        }
                        if (!isset($_GET["userId"]) && $emailVisibility === "TRUE") {
                            echo "checked></td>";
                        } else if (!isset($_GET["userId"])) {
                            echo "></td>";
                        }
                    ?>
                </tr>
                <tr>
                    <th id="csatlakozasoddatuma">Csatlakozásom dátuma:</th>
                    <td headers="csatlakozasoddatuma">
                    <?php 
                        if (isset($registerTime)) {
                            echo $registerTime;
                        } else {
                            echo "";
                        }
                    ?>
                    </td>
                    <?php
                        if (!isset($_GET["userId"]) || (isset($_SESSION["userID"]) && $_GET["userId"] === $_SESSION["userID"])) {
                            echo "<td><input type='checkbox' id='checkbox3' name='csatlakozasdatum' disabled checked></td>";
                        }
                    ?>        
                </tr>
            </table>
            <?php 
                if ((isset($_GET['userId']) && isset($_SESSION['userID']) && $_GET['userId'] === $_SESSION['userID']) || !isset($_GET['userId']))
                    echo "<form action='ProfilModositas.php'><input type='submit' name='change' id='change' value='Módosítás'></form>";
            ?>
            <br>
            <?php
                if ((isset($_GET["userId"]) && $favquoteVisibility === "TRUE") || (isset($_SESSION["userID"]) && !isset($_GET["userId"])) || (isset($_SESSION["userID"]) && $_GET["userId"] === $_SESSION["userID"])) {
                    echo "<p class='quote'>A kedvenc idézetem:</p> <br>
                    <p class='quote'><em><q>$favquote</q></em></p> <br>";
                }
            ?>    
        </div>
        <?php
            if ((isset($_GET['userId']) && isset($_SESSION['userID']) && $_GET['userId'] === $_SESSION['userID']) || !isset($_GET['userId'])) {
                echo "<form action='PHP/Logout.php' method='get' class='logout'>
                    <input type='submit' value='Kijelentkezés'>
                </form>";
            }
        ?>
        <?php
            if ((isset($_GET['userId']) && isset($_SESSION['userID']) && $_GET['userId'] === $_SESSION['userID']) || !isset($_GET['userId']) || (isset($_SESSION["userID"]) && $_SESSION['userID'] == 1)) {
                echo "<form action='PHP/DeleteUser.php' method='get' class='logout' style='width:15%;height:40px;padding:5px;'>
                    <input style='font-size:20px;' type='submit' value='Profil törlése'>
                    <input type='hidden' name='id' value='$userID'>
                </form>";
            }
        ?>
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