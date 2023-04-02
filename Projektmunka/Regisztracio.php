<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztráció - Macskalak</title>
    <link rel="stylesheet" href="CSS/navBar.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/regisztracio.css">
    <link rel="icon" type="image/x-icon" href="kepek/cat.png">
</head>
<body>

    <nav>
        <ul>
            <li><a href="Profil.php" class="gomb">Profil</a></li>
            <li><a href="Rolunk.php" class="gomb">Támogatás</a></li>
            <li><a href="Forum.php" class="gomb">Fórum</a></li>
            <li><a href="index.php" class="gomb">Kezdőlap</a></li>
            <li class="icon-img-container"><a href="index.php"><img src="Kepek/cat.png" class="icon-img" alt="Logo"></a></li>
        </ul>
    </nav>

    <main>
        <br>
        <form method="post" class="register_form" action="Bejelentkezes.php">
            <div class="form-block">
                <h1 class="h1_register">Regisztráció</h1>
                <hr>
                <fieldset>
                    <legend>Adatok</legend>
                    <div class="grid-container">
                        <div class="grid-item">
                            <label for="username">
                                Felhasználónév:
                            </label>
                        </div>
                        <div class="grid-item">    
                            <input type="text" name="username" id="username" placeholder="Sanyi Cica" required>
                        </div>
                        <div class="grid-item">   
                            <label for="email">
                                E-mail:
                            </label>
                        </div>
                        <div class="grid-item">  
                            <input type="email" name="email" id="email" placeholder="valaki@email.com" required>
                        </div>
                        <div class="grid-item">    
                            <label for="password">
                                Jelszó:
                            </label>
                        </div>
                        <div class="grid-item">    
                            <input type="password" name="password" id="password" placeholder="Biztonságos jelszót adj meg!" required>
                        </div>
                        <div class="grid-item">    
                            <label for="password-again">
                                Jelszó ismét:
                            </label>
                        </div>
                        <div class="grid-item">    
                            <input type="password" name="password-again" id="password-again" placeholder="Na mégegyszer!" required>   
                        </div>      
                    </div>
                </fieldset>    
            </div>
            <div class="grid-container-c">
                <div class="grid-item-c">
                    <input type="checkbox" id="agreement" required> 
                </div>
                <div class="grid-item-c">    
                    <label for="agreement" style="font-size: 100%;">A regisztrációval beleegyezel, hogy adataidat titkosan kezeljük, és a szervereinken tárolhassuk. Csupa klassz dolog, nemde?</label>     
                </div>
                <div class="grid-item-c">           
                    <input type="checkbox" id="subscribe">
                </div>
                <div class="grid-item-c">    
                    <label for="subscribe" style="font-size: 100%;">Szeretnék feliratkozni a Macskalak hírlevelére, mely napi rendszerességgel fogja bombázni a postaládám, nehogy egy pillanatig is macskás képek nélkül maradjak.</label>
                </div>    
            </div>
            <label for="register">
                <input type="submit" name="submit-btn" id="register" value="Regisztrálok!">
            </label>

            <label for="reset">
                <input type="reset" name="reset-btn" id="reset" value="Állítsd vissza!">
            </label>
            
            <br>
            <a href="Bejelentkezes.php" id="notyet_member" target="_self">Már tagja vagy cicasztikus közösségünknek?</a>
        </form>
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