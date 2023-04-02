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
</head>
<body>
    <nav>
        <ul>
            <li><a href="Profil.php" class="gomb">Profil</a></li>
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
        <?php
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'Macskalak';
            $connection = new mysqli($servername, $username, $password, $dbname);
            if ($connection -> connect_error) {
                die("connection error: " . $connection->connect_error);
            }

            $query = "SELECT * FROM forum";
            $result = $connection->query($query);

            if ($result -> num_rows > 0) {
                while ($row = $result -> fetch_assoc()) {
                    $name = $row['name'];
                    $imgName = $row['imgName'];
                    $description = $row['description'];
                    $comments = explode("|", $row['comments']);
                    echo
                    "<div id='$name'>
                        <h2>$name</h2>
                        <div class='flexbox'>
                            <div class='kep' style='background-image: url(" . "Kepek/Adoptalos/$imgName" . ");'></div>
                            <div class='description'>
                                <p>$description</p>
                                <hr>
                                <input type='text' placeholder='Kommentelj...'>
                                <button id='kuldes'>Küldés</button>";
                    echo "<ul>";
                    foreach(explode('|', $row['comments']) as $s) {
                        echo "<li>$s</li>";
                    }
                    echo "</ul>
                                <button class='orokbefogad' onclick='window.location.href='Regisztracio.php''>Örökbefogad!</button>
                            </div>
                        </div>
                    </div>";
                }
            }

            $connection->close();
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