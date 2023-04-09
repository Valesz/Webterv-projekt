<html>
<head>
    <title>MySQL Inicialization</title>
</head>
    
<body>
    
    <?php
        $servername='localhost';
        $username='root';
        $password='';
        $connection = new mysqli($servername, $username, $password);
        if ($connection -> connect_error) {
            die("connection error: " . $connection->connect_error);
        }

        $query = "CREATE DATABASE Macskalak";
        if ($connection->query($query) === TRUE) {
            echo "Database created successfully<br>";
        } else {
            echo "Error creating database: " . $connection->error;
        }
        
        $connection->close();

        echo "<br>FORUM TÁBLA<br>";

        $dbname='Macskalak';
        $connection=new mysqli($servername, $username, $password, $dbname);
        if ($connection -> connect_error) {
            die("connection error: " . $connection->connect_error);
        }

        $query = "CREATE TABLE forum (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
            name VARCHAR(30) NOT NULL,
            imgName VARCHAR(30) NOT NULL,
            description VARCHAR(200)
        )";

        if ($connection->query($query) === TRUE) {
            echo "Table created successfully<br>";
        } else {
            echo "Error creating table: " . $connection->error;
        }

        $query = "INSERT INTO forum (name, imgName, description)
            VALUES 
            ('Jerry', 'Jerry.jpg', 'Végre megszabadult Tom elől, és most a segítségedet kéri, hogy soha ne találjon rá!'),
            ('Junior', 'Junior.jpg', 'Icike-picike aranyos kiscica keresi gazdáját, minél előbb!'),
            ('Szimat', 'Szimat.jpg', 'Szimat a minden, a megváltó, a prog 1 gyakvez, a dékán, és még te is!'),
            ('Po', 'Po.jpg', 'Sárkányharcosunk keresi elveszett gazdáját!'),
            ('Karcsi', 'Karcsi.jpg', 'A \"legokosabb\" macska gazdáját keresi... Kedvenc tevékenysége a fal bámulása, és az indokolatlan nyávogás'),
            ('Fogatlan', 'Fogatlan.jpg', 'Segítség elhagytam a Hablatyomat, és nem tudom merre van a haza!'),
            ('Gaia', 'Gaia.jpg', 'Gaia nehéz időszakon ment keresztül, ezért szeretetteljes és befogadó környezetre vágyik.'),
            ('Igor', 'Igor.jpg', 'Igor a tekintetével a gonoszt is kiűzi a lelkedből! Démonűző gazdáját keresi.'),
            ('Günter', 'Gunter.jpg', 'Günter egy játékos macska, így mellette lehetetlen az unatkozás!'),
            ('Rafiki', 'Rafiki.jpg', 'A méltóságteljes Rafiki keresi a nyugodtabb cicára vágyó leendő gazdáját!')";
        if ($connection->query($query) === TRUE) {
            echo "Record inserted successfully<br>";
        } else {
            echo "Error creating record: " . $connection->error;
        }

        echo "<br>KOMMENTEK TÁBLA<br>";

        $query = "CREATE TABLE kommentek (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
            value VARCHAR(250) NOT NULL,
            postId int NOT NULL
        )";

        if ($connection->query($query) === TRUE) {
            echo "Table created successfully<br>";
        } else {
            echo "Error creating table: " . $connection->error;
        }

        $query = "INSERT INTO kommentek (value, postId)
            VALUES 
            ('Nagyon aranyos cica 😍', 10),
            ('Mint egy igazi oroszlán 😎', 10),
            ('Ez a kép annyira cuki, hogy azonnal meg kell osztanom a barátaimmal is!', 10),
            ('Ó, de aranyos! Milyen bájos kis macska!', 9),
            ('Azonnal elolvadok ettől a kis aranyos fejétől!', 9),
            ('Ez a kép igazán megmutatja, mennyire szerethetőek és aranyosak tudnak lenni a cicák.', 9),
            ('A cicák ilyen bájosak, hogy az embernek nincs más választása, mint rajongani értük!', 8),
            ('Ez a kis cica olyan aranyos, hogy az ember rögtön megszeretné!', 8),
            ('Milyen bájos és szerethető kis állat ez a cica!', 8),
            ('Szegény cica 😥', 7),
            ('Mi így is imádunk téged!', 7),
            ('Gyönyörű kis cica így is! Number 1 Gaia fan vagyok!', 7),
            ('SáRkÁnYyYy!! 😱😱😱😱', 6),
            ('Hol van Hablaty? 🤔', 6),
            ('Mi van a kissárkányokkal? 😨', 6),
            ('Nemcsak gyönyörű, hanem nagyon okos is lehet ez a kis cica!', 5),
            ('Milyen macskát nézel te? 😂', 5),
            ('Őt sem az eszéért szeretjük 🥰', 5),
            ('Igazi sárkányharcos! 🐼', 4),
            ('Shifu mester büszkesége!', 4),
            ('Legendás harcos!', 4),
            ('Szimat!', 3),('Szimat!', 3),('Szimat!', 3),('Szimat!', 3),('Szimat!', 3),('Szimat!', 3),
            ('Ez olyan édes, hogy szinte elolvadok! 😍😍', 2),
            ('Egy ilyen aranyos kis macskát bárki szívesen magáénak tudna! 🥰', 2),
            ('Ez a kép teljesen elvarázsol és boldoggá tesz! 🥰', 2),
            ('Megmentelek én Tom elől!', 1),
            ('Fuss ameddig tudsz! - Tom', 1),
            ('Szerepet váltottatok? ....', 1)";
        if ($connection->query($query) === TRUE) {
            echo "Record inserted successfully<br>";
        } else {
            echo "Error creating record: " . $connection->error;
        }

        echo "<br>FELHASZNÁLÓK TÁBLA<br>";

        $query = "CREATE TABLE Users (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(35) NOT NULL,
            email VARCHAR(70) NOT NULL,
            password VARCHAR(100) NOT NULL
        )";

        if ($connection->query($query) === TRUE) {
            echo "Table created successfully<br>";
        } else {
            echo "Error creating table: " . $connection->error;
        }

        $query = "INSERT INTO Users (username, email, password)
        VALUES 
        ('admin', 'admin@admin.hu', 'admin'),
        ('testuser', 'testuser@testuser.hu', 'testuser123')
        ";

        if ($connection->query($query) === TRUE) {
            echo "Record inserted successfully<br>";
        } else {
            echo "Error creating record: " . $connection->error;
        }

        $connection->close();
    ?>

</body>
</html>