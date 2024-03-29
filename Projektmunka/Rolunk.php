<?php
    include "PHP/NewsletterCheck.php";
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rólunk - Macskalak</title>
    <link rel="stylesheet" href="CSS/navBar.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/rolunk.css">
    <link rel="icon" type="image/x-icon" href="kepek/cat.png">
</head>
<body>
    
    <nav>
        <ul>
            <li><a href="Bejelentkezes.php" class="gomb">Profil</a></li>
            <li><a href="Rolunk.php" class="gomb active">Támogatás</a></li>
            <li><a href="Forum.php" class="gomb">Fórum</a></li>
            <li><a href="index.php" class="gomb">Kezdőlap</a></li>
            <li class="icon-img-container"><a href="index.php"><img src="Kepek/cat.png" class="icon-img" alt="Logo"></a></li>
        </ul>
    </nav>

    <main>
        <section>
            <h2 class="aboutus">Rólunk</h2>
            <div class="flexbox-container">
                <div class="card">
                    <div>
                        <h3>Kik is vagyunk pontosan?</h3>
                        <br>
                        <hr>
                        <p>A Macskalak vállalkozást ketten - Valentin és Kevin - alapítottuk egyetemista hallgatóként. Azóta a 2 fős csapat 10 főre növekedett, 
                            így munkánk még hatékonyabb tud lenni.
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <h3>Miért is csináljuk?</h3>
                        <br>
                        <hr>
                        <p>Azzal a céllal indítottuk el vállalkozásunkat, hogy azon macskáknak is szerető otthont és családot biztosíthassunk akik valamiféle szerencsétlenség során már
                            nem élhetnek teljes életet. Célunk az összes kóbor macskának szerető közeget találni, mert hiszünk abban, hogy ez mindegyiknek jár.
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <h3>Sikereink</h3>
                        <br>
                        <hr>
                        <p>Megannyi örömteli nyávogás, szerető és boldog gazdik, csodálatos pillanatok. Elköteleztük magunkat mindezek mellett, 
                            és 3 évnyi munka után úgy néz ki erőfeszítéseink célba értek, melyekkel megannyi cica és gazda mindennapjait tettük szebbé,
                            és megannyiét tudjuk a jövőben szintén csodálatossá tenni.
                        </p>
                    </div>
                </div>
            </div>
            <hr>
        </section>
        <section>
            <h2 class="help">Miért van szükségünk rád?</h2>
            <div class="card">
                <p class="donate">Ahhoz, hogy a kiscicáknak ideiglenes helyet tudjunk biztosítani, míg nem jutnak el szerető gazdijaikhoz, (étel és pénzbeli) adományokra van
                    szükségünk. Mindent megteszünk, hogy a lehető legjobbat nyújtsuk a kis szőrpamacsoknak, de ehhez szükségünk van <strong>Rád</strong>!
                </p>
            </div>
        </section>
        <section>
            <hr>
            <h2 class="help">Hogy tudsz segíteni?</h2>
            <div class="card">
                <p class="donate">Mindössze annyi a dolgod, hogy az alábbi gombra kattintva pénzzel, vagy a <strong>Kaparófalva, Miautca 12</strong> címre macskaeledelt hozol.
                </p>
            </div>
            <form>
                <input type="button" onclick="window.location.href='Kepek/Random-Eotvos.jpg'" name="gomb" value="Támogat">
            </form>
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