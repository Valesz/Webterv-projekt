<?php
    include "PHP/BejelentkezesCheck.php";
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés - Macskalak</title>
    <link rel="stylesheet" href="CSS/navBar.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/bejelentkezes.css">
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
        <form method="post" class="login_form">
            <div class="form-block">
                <h1 class="h1_login">Bejelentkezés</h1>
                <?php
                    /*if ($sikeres === TRUE) {
                        echo
                        "<h3 style='color: red';>Sikeres regisztráció!</h3>";
                    }*/
                ?>
                <hr>
                <div class="grid-container">
                    <div class="grid-item">
                        <label for="username">
                            Felhasználónév:
                        </label>
                    </div>    
                    <div class="grid-item">    
                        <input type="text" name="username" id="username" placeholder="Felhasználónév" value="<?php if(isset($_POST['submit-btn'])) echo $_POST['username']; ?>" required>
                    </div>
                    <?php 
                        if (strlen($usernameErrorMessage) > 0)
                            echo "
                            <div class='grid-item' style='grid-column: 1/3; gap:5px; text-align:center;'>
                                <label style='color:red; font-size: 20px;'>
                                    $usernameErrorMessage
                                </label>
                            </div> ";
                    ?>
                    <div class="grid-item">    
                        <label for="password">
                            Jelszó:
                        </label>  
                    </div>
                    <div>    
                        <input type="password" name="password" id="password" placeholder="Jelszó" required>  
                    </div>  
                    <?php 
                        if (strlen($passwordErrorMessage) > 0)
                            echo "
                            <div class='grid-item' style='grid-column: 1/3; gap:5px; text-align:center;'>
                                <label style='color:red; font-size: 20px;'>
                                    $passwordErrorMessage;
                                </label>
                            </div> ";
                    ?>
                </div>
            </div>
            
            <div class="grid-container-c">
                <div class="grid-item-c">    
                    <input type="checkbox" id="remember_me" name="remember_me"> 
                </div>
                <div class="grid-item-c">    
                    <label for="remember_me" style="font-size: 100%;">Jegyezz meg!</label>
                </div>
            </div>

            <label for="login">
            <input type="submit" name="submit-btn" id="login" value="Irány a Cicabirodalom!">
            </label>     
            
            <br>
            <a href="Regisztracio.php" id="already_member" target="_self">Még nem vagy tagja cicasztikus közösségünknek?</a>
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