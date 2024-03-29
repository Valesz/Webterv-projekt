<?php
    include "PHP/NewsletterCheck.php";
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Macskalak</title>
    <link rel="stylesheet" href="CSS/fooldal.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="icon" type="image/x-icon" href="kepek/cat.png">
</head>
<body>
    <header>
        <div class="header-container">
            <p class="cim">Macskalak</p>
            <hr>
            <p class="alCim">Ahol a macskáink várnak!</p>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="Bejelentkezes.php" class="gomb">Profil</a></li>
            <li><a href="Rolunk.php" class="gomb">Támogatás</a></li>
            <li><a href="Forum.php" class="gomb">Fórum</a></li>
            <li><a href="index.php" class="gomb active">Kezdőlap</a></li>
            <li class="icon-img-container"><a href="index.php"><img src="Kepek/cat.png" class="icon-img" alt="Logo"></a></li>
        </ul>
    </nav>
    <main>
        <section class="adoptalas-container">
            <h2>Adoptálj még ma!</h2>
            <div class="flexbox">
                <a href="Forum.php#Rafiki" class="adoptalas">
                    <div class="macska-kep">
                        <img src="Kepek/Adoptalos/Rafiki.jpg" alt="Adoptálható macska Rafiki">
                        <h3 class="img-description">Rafiki</h3>
                        <p class="img-description">A méltóságteljes Rafiki keresi a nyugodtabb cicára vágyó leendő gazdáját!</p>
                    </div>
                </a>
                <a href="Forum.php#Gunter" class="adoptalas">
                    <div class="macska-kep">
                        <img src="Kepek/Adoptalos/Gunter.jpg" alt="Adoptálható macska Günter">
                        <h3 class="img-description">Günter</h3>
                        <p class="img-description">Günter egy játékos macska, így mellette lehetetlen az unatkozás!</p>
                    </div>
                </a>
                <a href="Forum.php#Igor" class="adoptalas">
                    <div class="macska-kep">
                        <img src="Kepek/Adoptalos/Igor.jpg" alt="Adoptálható macska Igor">
                        <h3 class="img-description">Igor</h3>
                        <p class="img-description">Igor a tekintetével a gonoszt is kiűzi a lelkedből! Démonűző gazdáját keresi.</p>
                    </div>
                </a>
                <a href="Forum.php#Gaia" class="adoptalas">
                    <div class="macska-kep">
                        <img src="Kepek/Adoptalos/Gaia.jpg" alt="Adoptálható macska Gaia">
                        <h3 class="img-description">Gaia</h3>
                        <p class="img-description">Gaia nehéz időszakon ment keresztül, ezért szeretetteljes és befogadó környezetre vágyik.</p>
                    </div>
                </a>
            </div>
            <form>
                <input type="button" onclick="window.location.href='Forum.php'" value="Ugrás a cicafórumra!">
            </form>
            
        </section>
        <section class="tamogatas">
            <h2>Így tudsz te is segíteni rajtuk!</h2>
            <div class="flexbox">
                <a href="Rolunk.php" class="segitseg">
                    <img src="Kepek/Ikonok/Onkentesseg.jpg" alt="Önkénteskedés kép">
                    <h3 class="img-description">Önkéntesség</h3>
                    <p class="img-description">A cicák gondozásához önkéntesekre is szükségünk van, ezért ha szeretsz szabadidődben állatokkal foglalkozni nálunk megtalálod a helyed!</p>
                </a>
                <a href="Rolunk.php" class="segitseg">
                    <img src="Kepek/Ikonok/Donation.jpg" alt="Támogatás kép">
                    <h3 class="img-description">Támogatás</h3>
                    <p class="img-description">Segítsd macskamentő munkánkat, és támogasd a cicákat akár adód 1%-val is, hogy boldogabbak legyenek!</p>
                </a>
                <a href="Regisztracio.php" class="segitseg">
                    <img src="Kepek/Ikonok/Adopt.jpg" alt="Örökbefogadás kép">
                    <h3 class="img-description">Örökbefogadás</h3>
                    <p class="img-description">Fogadj örökbe egy cicát, és éljetek együtt boldogan! Hisz mind tudjuk, egy cicának egy szerető otthonra van szüksége!</p>
                </a>
            </div>
        </section>
        <section class="statisztikak">
            <div class="flexbox">
                <div class="statisztikak">
                    <img src="Kepek/Ikonok/Cica2.jpg" alt="Ikon">
                    <p>3500</p>
                    <h3>Örömteli <br> nyávogás</h3>
                </div>
                <div class="statisztikak">
                    <img src="Kepek/Ikonok/Onkentes2.jpg" alt="Ikon">
                    <p>120</p>
                    <h3>Boldog <br> önkéntes</h3>
                </div>
                <div class="statisztikak">
                    <img src="Kepek/Ikonok/Cica4.jpg" alt="Ikon">
                    <p>320</p>
                    <h3>Otthont kereső<br>Aranyos Macska</h3>
                </div>
                <div class="statisztikak">
                    <img src="Kepek/Ikonok/Haziko.jpg" alt="Ikon">
                    <p>12</p>
                    <h3>Telephely <br> országszerte</h3>
                </div>
                <div class="statisztikak">
                    <img src="Kepek/Ikonok/Cica1.jpg" alt="Ikon">
                    <p>57</p>
                    <h3>Megmentett <br> Macskaféle</h3>
                </div>
            </div>
        </section>
        <section class="cicaink-gondolata">
            <h2>Macskáink gondolatai</h2>
            <div class="flexbox">
                <div>
                    <img src="Kepek/Adoptalos/Po.jpg" alt="Po macska kép">
                    <p>
                        <q>Kedvenceim közé tartoznak a gombócok és a simogatások... de azért aludni is szeretek.</q>
                        <br>- Po
                    </p>
                </div>
                <div>
                    <img src="Kepek/Adoptalos/Fogatlan.jpg" alt="Fogatlan macska kép">
                    <p>
                        <q>Szerettem röpködni ameddig tudtam, de már csak egy kis ártatlan cica lettem, aki egy szerető és játékos gazdát keres.</q>
                        <br>- Fogatlan
                    </p>
                </div>
                <div>
                    <img src="Kepek/Adoptalos/Karcsi.jpg" alt="Karcsi... no more needed">
                    <p>
                        <q>Mew mew mew mew? MeOeOeOw!!!! Meow... Meow 😭</q>
                        <br>- Karcsi
                    </p>
                </div>
                <div>
                    <img src="Kepek/Adoptalos/Junior.jpg" alt="Icike picike Juniorocskáról kép">
                    <p>
                        <q>Egy icike-picike cicuska vagyok, aki remélhetőleg egy szerető otthonban fog felnőni rengeteg gyerek között.</q>
                        <br>- Junior
                    </p>
                </div>
            </div>
        </section>
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