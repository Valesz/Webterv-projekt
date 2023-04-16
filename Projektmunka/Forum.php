<?php
    session_start();
    include "PHP/Upload.php";
    include "PHP/Comments.php";
    include "PHP/DeletePost.php";
    include "PHP/NewsletterCheck.php";

    if (isset($_COOKIE['userID']) || isset($_SESSION['userID'])) {
        if (isset($_COOKIE['userID'])) {
            $_SESSION['userID'] = $_COOKIE['userID'];
        }
    }

    $posts = "";

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
    
    $query = "SELECT * FROM forum ORDER BY id DESC";
    $result = $connection->query($query);

    if ($result -> num_rows > 0) {
        while ($row = $result -> fetch_assoc()) {
            $name = $row['name'];
            $imgName = $row['imgName'];
            $description = $row['description'];
            $i = $row['id'];
            $ownerID = $row['ownerID'];
            $posts = $posts .
            "<div id='$name'>";

                if (isset($_SESSION['userID']) && ($_SESSION['userID'] === $ownerID || $_SESSION['userID'] === "1")) {
                    $posts = $posts . "<form class='xSymbol'>
                        <input type='submit' value='' name='torles'> <input type='hidden' name='index' value='$i'> 
                    </form>";
                }

                $posts = $posts . "<h2>$name</h2>
                <div class='flexbox'>
                    <div class='kep' style='background-image: url(" . "Kepek/Adoptalos/$imgName" . ");'></div>
                    <div class='description'>
                        <p>$description</p>
                        <hr>
                        <form method='GET'>
                            <input type='text' name='index' value='$i' style='display: none;'>
                            <input type='text' name='komment' placeholder='Kommentelj...' required>
                            <input type='submit' id='kuldes$i'>
                        </form>";
            $posts = $posts . "<ul>";

            $komQuery = "SELECT kommentek.value, users.id, users.username FROM kommentek
                INNER JOIN forum
                ON kommentek.postId = forum.id
                INNER JOIN users
                ON kommentek.owner = users.username
                WHERE forum.id = $i";
            $commentsRes = $connection -> query($komQuery);
            while ($comments = $commentsRes -> fetch_assoc()) {
                $comment = $comments['value'];
                $userID = $comments['id'];
                $username = $comments['username'];
                $posts = $posts . "<li>
                <form action='Profil.php' method='GET'>
                    <input type='submit' value='$username:' name='profilOpen' class='commentNev'>
                    <input type='hidden' value='$userID' name='userId'>
                </form>
                <p>$comment</p>
                </li>";
            }

            $posts = $posts . "</ul>
                    </div>
                </div>
            </div>";
            $i--;
        }
    }

    $connection->close();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cicafórum - Macskalak</title>
    <link rel="stylesheet" href="CSS/navBar.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/forum.css">
    <link rel="icon" type="image/x-icon" href="kepek/cat.png">
    <script>
        function feltoltesGomb() {
            if (document.getElementById("feltoltes").style.display == "block") {
                document.getElementById("feltoltes").style.display = "none";
                document.getElementById("feltoltesGomb").style.backgroundImage = "url('Kepek/Ikonok/PluszJel.jpg')";
            } else {
                document.getElementById("feltoltes").style.display = "block";
                document.getElementById("feltoltesGomb").style.backgroundImage = "url('Kepek/Ikonok/MinuszJel.jpg')";
            }
        }
    </script>
</head>
<body>
    <nav>
        <ul>
            <li><a href="Bejelentkezes.php" class="gomb">Profil</a></li>
            <li><a href="Rolunk.php" class="gomb">Támogatás</a></li>
            <li><a href="Forum.php" class="gomb active">Fórum</a></li>
            <li><a href="index.php" class="gomb">Kezdőlap</a></li>
            <li class="icon-img-container"><a href="index.php"><img src="Kepek/cat.png" class="icon-img" alt="Logo"></a></li>
        </ul>
    </nav>
    <header>
        <h1>Cicafórum</h1>
    </header>
    <main class="flexbox">

        <div class="addPost">
            <button id="feltoltesGomb" onclick="feltoltesGomb()"></button>
        </div>

        <div id="feltoltes" class="feltoltes">
            <h2>Feltöltés</h2>
            <div>
                <form method="POST" enctype="multipart/form-data" class="flexbox">
                    <label class="kep" style="min-height: 100px;">
                        <input name="file" id="file" type="file">
                    </label>
                    <div class="description">
                        <label>
                            <sup>*</sup>Név:<br>
                            <input type="text" name="name" required><br>
                        </label>
                        <label>
                            <sup>*</sup>Leírás:<br>
                            <input type="text" name="description" required><br>
                        </label>
                        <input type="submit" value="Feltöltés!" name="feltoltes"><br>
                        <label>Csak ".jpg" ".png" ".jpeg" ".gif" fájlformátum!</label><br>
                        <label style="color:red;"><?php echo $uploadErrorMessage ?></label>
                    </div>
                </form>
            </div>
        </div>
        <?php echo $posts; ?>
    </main>
    <footer>
        <div>
            <h1>Elérhetőségeink:</h1>
            <p>Tel: +3630 123 4567</p>
            <p>Email: info@macskalak.hu</p>
            <p>Facebook: Macskalak</p>
            <p>Instagram: Macskalak</p>
            <p>Telephely: Macsköztársaság, Kaparófalva, Miautca 12(cicenkettő).</p>
            <form class="footer_form" method="POST">
                <h1>Iratkozz fel hírlevelünkre a funtasztikus cicás hírekért!</h1>
                <input type="email" name="emailfornewsletter" placeholder="valaki@email.com" required>
                <input type="submit" name="nl_submit_btn" value="Miau!">
                <?php
                    if ($emailhiba === "badformat") {
                        echo "<p class='errormessage'>Az email cím nem megfelelő formátumú!</p>";
                    }
                    if ($emailhiba === "used") {
                        echo "<p class='errormessage'>Ezzel az email címmel már regisztráltak!</p>";
                    }
                ?>
            </form>
        </div>
        <p class="copyright"><sup>©</sup> 2023 Macskalak</p>
    </footer>
</body>
</html>