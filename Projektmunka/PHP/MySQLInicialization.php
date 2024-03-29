<!DOCTYPE html>
<html lang="en">
<head>
    <title>MySQL Inicialization</title>
</head>
    
<body>
    
    <?php

        // kapcsolat létrehozása

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

        // forum tábla létrehozás
        
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
            description VARCHAR(200),
            ownerID INT NOT NULL
        )";

        if ($connection->query($query) === TRUE) {
            echo "Table created successfully<br>";
        } else {
            echo "Error creating table: " . $connection->error;
        }

        $query = "INSERT INTO forum (name, imgName, description, ownerID)
            VALUES 
            ('Jerry', 'Jerry.jpg', 'Végre megszabadult Tom elől, és most a segítségedet kéri, hogy soha ne találjon rá!', 1),
            ('Junior', 'Junior.jpg', 'Icike-picike aranyos kiscica keresi gazdáját, minél előbb!', 1),
            ('Szimat', 'Szimat.jpg', 'Szimat a minden, a megváltó, a prog 1 gyakvez, a dékán, és még te is!', 1),
            ('Po', 'Po.jpg', 'Sárkányharcosunk keresi elveszett gazdáját!', 1),
            ('Karcsi', 'Karcsi.jpg', 'A \"legokosabb\" macska gazdáját keresi... Kedvenc tevékenysége a fal bámulása, és az indokolatlan nyávogás', 1),
            ('Fogatlan', 'Fogatlan.jpg', 'Segítség elhagytam a Hablatyomat, és nem tudom merre van a haza!', 1),
            ('Gaia', 'Gaia.jpg', 'Gaia nehéz időszakon ment keresztül, ezért szeretetteljes és befogadó környezetre vágyik.', 1),
            ('Igor', 'Igor.jpg', 'Igor a tekintetével a gonoszt is kiűzi a lelkedből! Démonűző gazdáját keresi.', 1),
            ('Günter', 'Gunter.jpg', 'Günter egy játékos macska, így mellette lehetetlen az unatkozás!', 3),
            ('Rafiki', 'Rafiki.jpg', 'A méltóságteljes Rafiki keresi a nyugodtabb cicára vágyó leendő gazdáját!', 1)";
        if ($connection->query($query) === TRUE) {
            echo "Record inserted successfully<br>";
        } else {
            echo "Error creating record: " . $connection->error;
        }

        // kommentek tábla létrehozása

        echo "<br>KOMMENTEK TÁBLA<br>";

        $query = "CREATE TABLE kommentek (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
            value VARCHAR(250) NOT NULL,
            postId int NOT NULL,
            owner VARCHAR(30) NOT NULL
        )";

        if ($connection->query($query) === TRUE) {
            echo "Table created successfully<br>";
        } else {
            echo "Error creating table: " . $connection->error;
        }

        $query = "INSERT INTO kommentek (value, postId, owner)
            VALUES 
            ('Nagyon aranyos cica 😍', 10, 'Valesz'),
            ('Mint egy igazi oroszlán 😎', 10, 'Kevin'),
            ('Ez a kép annyira cuki, hogy azonnal meg kell osztanom a barátaimmal is!', 10, 'Valesz'),
            ('Ó, de aranyos! Milyen bájos kis macska!', 9, 'Valesz'),
            ('Azonnal elolvadok ettől a kis aranyos fejétől!', 9, 'Kevin'),
            ('Ez a kép igazán megmutatja, mennyire szerethetőek és aranyosak tudnak lenni a cicák.', 9, 'Valesz'),
            ('A cicák ilyen bájosak, hogy az embernek nincs más választása, mint rajongani értük!', 8, 'Valesz'),
            ('Ez a kis cica olyan aranyos, hogy az ember rögtön megszeretné!', 8, 'Kevin'),
            ('Milyen bájos és szerethető kis állat ez a cica!', 8, 'Valesz'),
            ('Szegény cica 😥', 7, 'Valesz'),
            ('Mi így is imádunk téged!', 7, 'Kevin'),
            ('Gyönyörű kis cica így is! Number 1 Gaia fan vagyok!', 7, 'Valesz'),
            ('SáRkÁnYyYy!! 😱😱😱😱', 6, 'Valesz'),
            ('Hol van Hablaty? 🤔', 6, 'Kevin'),
            ('Mi van a kissárkányokkal? 😨', 6, 'Valesz'),
            ('Nemcsak gyönyörű, hanem nagyon okos is lehet ez a kis cica!', 5, 'Valesz'),
            ('Milyen macskát nézel te? 😂', 5, 'Kevin'),
            ('Őt sem az eszéért szeretjük 🥰', 5, 'Valesz'),
            ('Igazi sárkányharcos! 🐼', 4, 'Valesz'),
            ('Shifu mester büszkesége!', 4, 'Kevin'),
            ('Legendás harcos!', 4, 'Valesz'),
            ('Szimat!', 3, 'Valesz'),
            ('Szimat!', 3, 'Kevin'),
            ('Szimat!', 3, 'Valesz'),
            ('Szimat!', 3, 'Kevin'),
            ('Szimat!', 3, 'Valesz'),
            ('Szimat!', 3, 'Kevin'),
            ('Ez olyan édes, hogy szinte elolvadok! 😍😍', 2, 'Valesz'),
            ('Egy ilyen aranyos kis macskát bárki szívesen magáénak tudna! 🥰', 2, 'Kevin'),
            ('Ez a kép teljesen elvarázsol és boldoggá tesz! 🥰', 2, 'Valesz'),
            ('Megmentelek én Tom elől!', 1, 'Valesz'),
            ('Fuss ameddig tudsz! - Tom', 1, 'Valesz'),
            ('Szerepet váltottatok? ....', 1, 'Kevin')";
        if ($connection->query($query) === TRUE) {
            echo "Record inserted successfully<br>";
        } else {
            echo "Error creating record: " . $connection->error;
        }

        // felhasználók tábla létrehozása

        echo "<br>FELHASZNÁLÓK TÁBLA<br>";

        $query = "CREATE TABLE Users (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(35) NOT NULL,
            email VARCHAR(70) NOT NULL,
            password VARCHAR(100) NOT NULL,
            birthday VARCHAR(100) NOT NULL,
            favquote VARCHAR(250) NOT NULL,
            favcat VARCHAR(35) NOT NULL,
            registerTime VARCHAR(250) NOT NULL,
            profilepic VARCHAR(300) NOT NULL,
            emailVisibility VARCHAR(5) NOT NULL,
            birthdayVisibility VARCHAR(5) NOT NULL,
            favcatVisibility VARCHAR(5) NOT NULL,
            favquoteVisibility VARCHAR(5) NOT NULL
        )";

        if ($connection->query($query) === TRUE) {
            echo "Table created successfully<br>";
        } else {
            echo "Error creating table: " . $connection->error;
        }

        $query = "INSERT INTO Users (username, email, password, registerTime, emailVisibility, birthdayVisibility, favcatVisibility, favquoteVisibility)
        VALUES 
        ('admin', 'admin@admin.hu', '" . password_hash("admin", PASSWORD_DEFAULT) . "', '" . date("Y-m-d") . "', 'FALSE', 'FALSE', 'TRUE', 'TRUE'),
        ('testuser', 'testuser@testuser.hu', '" . password_hash("test1234", PASSWORD_DEFAULT) . "', '" . date("Y-m-d") . "', 'FALSE', 'FALSE', 'TRUE', 'TRUE'),
        ('Valesz', 'valesz@gmail.com', '" . password_hash("ValeszAkiNemAKuki", PASSWORD_DEFAULT) . "', '" . date("Y-m-d") . "', 'FALSE', 'FALSE', 'TRUE', 'TRUE'),
        ('Kevin', 'kevin@gmail.com', '" . password_hash("KevinAkiNemAKuki", PASSWORD_DEFAULT) . "', '" . date("Y-m-d") . "', 'FALSE', 'FALSE', 'TRUE', 'TRUE')
        ";

        if ($connection->query($query) === TRUE) {
            echo "Record inserted successfully<br>";
        } else {
            echo "Error creating record: " . $connection->error;
        }

        // hirlevél tábla létrehozása

        echo "<br>HÍRLEVÉL TÁBLA<br>";

        $query = "CREATE TABLE hirlevel (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(70) NOT NULL
        )";
        
        if ($connection->query($query) === TRUE) {
            echo "Table created successfully<br>";
        } else {
            echo "Error creating table: " . $connection->error;
        }

        $query = "INSERT INTO hirlevel (email)
        VALUES
        ('valesz@gmail.com'),
        ('kevin@gmail.com')
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