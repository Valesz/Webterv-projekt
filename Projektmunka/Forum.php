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
                                <button id='kuldes'>Küldés</button>
                                <ul>
                                    <li>Nagyon aranyos cica 😍</li>
                                    <li>Mint egy igazi oroszlán 😎</li>
                                    <li>Ez a kép annyira cuki, hogy azonnal meg kell osztanom a barátaimmal is!</li>
                                </ul>
                                <button class='orokbefogad' onclick='window.location.href='Regisztracio.php''>Örökbefogad!</button>
                            </div>
                        </div>
                    </div>";
                }
            }

            $connection->close();
        ?>
        <div id="Gunter">
            <h2>Günter</h2>
            <div class="flexbox">
                <div class="kep" style="background-image: url('Kepek/Adoptalos/Gunter.jpg');"></div>
                <div class="description">
                    <p>Günter egy játékos macska, így mellette lehetetlen az unatkozás!</p>
                    <hr>
                    <input type="text" placeholder="Kommentelj...">
                    <button id="kuldes1">Küldés</button>
                    <ul>
                        <li>Ó, de aranyos! Milyen bájos kis macska!</li>
                        <li>Azonnal elolvadok ettől a kis aranyos fejétől!</li>
                        <li>Ez a kép igazán megmutatja, mennyire szerethetőek és aranyosak tudnak lenni a cicák.</li>
                    </ul>
                    <button class="orokbefogad" onclick="window.location.href='Regisztracio.php'">Örökbefogad!</button>
                </div>
            </div>
        </div>
        <div id="Igor">
            <h2>Igor</h2>
            <div class="flexbox">
                <div class="kep"  style="background-image: url('Kepek/Adoptalos/Igor.jpg');"></div>
                <div class="description">
                    <p>Igor a tekintetével a gonoszt is kiűzi a lelkedből! Démonűző gazdáját keresi.</p>
                    <hr>
                    <input type="text" placeholder="Kommentelj...">
                    <button id="kuldes2">Küldés</button>
                    <ul>
                        <li>A cicák ilyen bájosak, hogy az embernek nincs más választása, mint rajongani értük!</li>
                        <li>Ez a kis cica olyan aranyos, hogy az ember rögtön megszeretné!</li>
                        <li>Milyen bájos és szerethető kis állat ez a cica!</li>
                    </ul>
                    <button class="orokbefogad" onclick="window.location.href='Regisztracio.php'">Örökbefogad!</button>
                </div>
            </div>
        </div>
        <div id="Gaia">
            <h2>Gaia</h2>
            <div class="flexbox">
                <div class="kep"  style="background-image: url('Kepek/Adoptalos/Gaia.jpg');"></div>
                <div class="description">
                    <p>Gaia nehéz időszakon ment keresztül, ezért szeretetteljes és befogadó környezetre vágyik.</p>
                    <hr>
                    <input type="text" placeholder="Kommentelj...">
                    <button id="kuldes3">Küldés</button>
                    <ul>
                        <li>Szegény cica 😥</li>
                        <li>Mi így is imádunk téged!</li>
                        <li>Gyönyörű kis cica így is! Number 1 Gaia fan vagyok!</li>
                    </ul>
                    <button class="orokbefogad" onclick="window.location.href='Regisztracio.php'">Örökbefogad!</button>
                </div>
            </div>
        </div>
        <div>
            <h2>Po</h2>
            <div class="flexbox">
                <div class="kep"  style="background-image: url('Kepek/Adoptalos/Po.jpg');"></div>
                <div class="description">
                    <p>Sárkányharcosunk keresi elveszett gazdáját!</p>
                    <hr>
                    <input type="text" placeholder="Kommentelj...">
                    <button id="kuldes4">Küldés</button>
                    <ul>
                        <li>Igazi sárkányharcos! 🐼</li>
                        <li>Shifu mester büszkesége!</li>
                        <li>Legendás harcos!</li>
                    </ul>
                    <button class="orokbefogad" onclick="window.location.href='Regisztracio.php'">Örökbefogad!</button>
                </div>
            </div>
        </div>
        <div>
            <h2>Karcsi</h2>
            <div class="flexbox">
                <div class="kep"  style="background-image: url('Kepek/Adoptalos/Karcsi.jpg');"></div>
                <div class="description">
                    <p>A "legokosabb" macska gazdáját keresi... Kedvenc tevékenysége a fal bámulása, és az indokolatlan nyávogás</p>
                    <hr>
                    <input type="text" placeholder="Kommentelj...">
                    <button id="kuldes5">Küldés</button>
                    <ul>
                        <li>Nemcsak gyönyörű, hanem nagyon okos is lehet ez a kis cica!</li>
                        <li>Milyen macskát nézel te? 😂</li>
                        <li>Őt sem az eszéért szeretjük 🥰</li>
                    </ul>
                    <button class="orokbefogad" onclick="window.location.href='Regisztracio.php'">Örökbefogad!</button>
                </div>
            </div>
        </div>
        <div>
            <h2>Fogatlan</h2>
            <div class="flexbox">
                <div class="kep"  style="background-image: url('Kepek/Adoptalos/Fogatlan.jpg');"></div>
                <div class="description">
                    <p>Segítség elhagytam a Hablatyomat, és nem tudom merre van a haza!</p>
                    <hr>
                    <input type="text" placeholder="Kommentelj...">
                    <button id="kuldes6">Küldés</button>
                    <ul>
                        <li>SáRkÁnYyYy!! 😱😱😱😱</li>
                        <li>Hol van Hablaty? 🤔</li>
                        <li>Mi van a kissárkányokkal? 😨</li>
                    </ul>
                    <button class="orokbefogad" onclick="window.location.href='Regisztracio.php'">Örökbefogad!</button>
                </div>
            </div>
        </div>
        <div>
            <h2>Szimat</h2>
            <div class="flexbox">
                <div class="kep"  style="background-image: url('Kepek/Adoptalos/Szimat.jpg');"></div>
                <div class="description">
                    <p>Szimat a minden, a megváltó, a prog 1 gyakvez, a dékán, és még te is!</p>
                    <hr>
                    <input type="text" placeholder="Kommentelj...">
                    <button id="kuldes7">Küldés</button>
                    <ul>
                        <li>Szimat!</li>
                        <li>Szimat!</li>
                        <li>Szimat!</li>
                        <li>Szimat!</li>
                        <li>Szimat!</li>
                        <li>Szimat!</li>
                        <li>Szimat!</li>
                        <li>Szimat!</li>
                        <li>Szimat!</li>
                        <li>Szimat!</li>
                        <li>Szimat!</li>
                        <li>Szimat!</li>
                        <li>Szimat!</li>
                        <li>Szimat!</li>
                        <li>Szimat!</li>
                        <li>Szimat!</li>
                        <li>Szimat!</li>
                        <li>Szimat!</li>
                    </ul>
                    <button class="orokbefogad" onclick="window.location.href='Regisztracio.php'">Örökbefogad!</button>
                </div>
            </div>
        </div>
        <div>
            <h2>Junior</h2>
            <div class="flexbox">
                <div class="kep"  style="background-image: url('Kepek/Adoptalos/Junior.jpg');"></div>
                <div class="description">
                    <p>Icike-picike aranyos kiscica keresi gazdáját, minél előbb!</p>
                    <hr>
                    <input type="text" placeholder="Kommentelj...">
                    <button id="kuldes8">Küldés</button>
                    <ul>
                        <li>Ez olyan édes, hogy szinte elolvadok! 😍😍</li>
                        <li>Egy ilyen aranyos kis macskát bárki szívesen magáénak tudna! 🥰</li>
                        <li>Ez a kép teljesen elvarázsol és boldoggá tesz! 🥰</li>
                    </ul>
                    <button class="orokbefogad" onclick="window.location.href='Regisztracio.php'">Örökbefogad!</button>
                </div>
            </div>
        </div>
        <div>
            <h2>Jerry</h2>
            <div class="flexbox">
                <div class="kep"  style="background-image: url('Kepek/Adoptalos/Jerry.jpg');"></div>
                <div class="description">
                    <p>Végre megszabadult Tom elől, és most a segítségedet kéri, hogy soha ne találjon rá!</p>
                    <hr>
                    <input type="text" placeholder="Kommentelj...">
                    <button id="kuldes9">Küldés</button>
                    <ul>
                        <li>Megmentelek én Tom elől!</li>
                        <li>Fuss ameddig tudsz!</li>
                        <li>Szerepet váltottatok? ....</li>
                    </ul>
                    <button class="orokbefogad" onclick="window.location.href='Regisztracio.php'">Örökbefogad!</button>
                </div>
            </div>
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