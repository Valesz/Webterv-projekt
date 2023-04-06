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
            description VARCHAR(200),
            comments VARCHAR(65535)
        )";

        if ($connection->query($query) === TRUE) {
            echo "Table created successfully<br>";
        } else {
            echo "Error creating table: " . $connection->error;
        }

        $query = "INSERT INTO forum (name, imgName, description, comments)
            VALUES 
            ('Jerry', 'Jerry.jpg', 'Végre megszabadult Tom elől, és most a segítségedet kéri, hogy soha ne találjon rá!', 'Megmentelek én Tom elől!|Fuss ameddig tudsz! - Tom|Szerepet váltottatok? ....'),
            ('Junior', 'Junior.jpg', 'Icike-picike aranyos kiscica keresi gazdáját, minél előbb!', 'Ez olyan édes, hogy szinte elolvadok! 😍😍|Egy ilyen aranyos kis macskát bárki szívesen magáénak tudna! 🥰|Ez a kép teljesen elvarázsol és boldoggá tesz! 🥰'),
            ('Szimat', 'Szimat.jpg', 'Szimat a minden, a megváltó, a prog 1 gyakvez, a dékán, és még te is!', 'Szimat!|Szimat!|Szimat!|Szimat!|Szimat!|Szimat!'),
            ('Po', 'Po.jpg', 'Sárkányharcosunk keresi elveszett gazdáját!', 'Igazi sárkányharcos! 🐼|Shifu mester büszkesége!|Legendás harcos!'),
            ('Karcsi', 'Karcsi.jpg', 'A \"legokosabb\" macska gazdáját keresi... Kedvenc tevékenysége a fal bámulása, és az indokolatlan nyávogás', 'Nemcsak gyönyörű, hanem nagyon okos is lehet ez a kis cica!|Milyen macskát nézel te? 😂|Őt sem az eszéért szeretjük 🥰'),
            ('Fogatlan', 'Fogatlan.jpg', 'Segítség elhagytam a Hablatyomat, és nem tudom merre van a haza!', 'SáRkÁnYyYy!! 😱😱😱😱|Hol van Hablaty? 🤔|Mi van a kissárkányokkal? 😨'),
            ('Gaia', 'Gaia.jpg', 'Gaia nehéz időszakon ment keresztül, ezért szeretetteljes és befogadó környezetre vágyik.', 'Szegény cica 😥|Mi így is imádunk téged!|Gyönyörű kis cica így is! Number 1 Gaia fan vagyok!'),
            ('Igor', 'Igor.jpg', 'Igor a tekintetével a gonoszt is kiűzi a lelkedből! Démonűző gazdáját keresi.', 'A cicák ilyen bájosak, hogy az embernek nincs más választása, mint rajongani értük!|Ez a kis cica olyan aranyos, hogy az ember rögtön megszeretné!|Milyen bájos és szerethető kis állat ez a cica!'),
            ('Günter', 'Gunter.jpg', 'Günter egy játékos macska, így mellette lehetetlen az unatkozás!', 'Ó, de aranyos! Milyen bájos kis macska!|Azonnal elolvadok ettől a kis aranyos fejétől!|Ez a kép igazán megmutatja, mennyire szerethetőek és aranyosak tudnak lenni a cicák.'),
            ('Rafiki', 'Rafiki.jpg', 'A méltóságteljes Rafiki keresi a nyugodtabb cicára vágyó leendő gazdáját!', 'Nagyon aranyos cica 😍|Mint egy igazi oroszlán 😎|Ez a kép annyira cuki, hogy azonnal meg kell osztanom a barátaimmal is!')";
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
            ('Nagyon aranyos cica 😍', 1),
            ('Mint egy igazi oroszlán 😎', 1),
            ('Ez a kép annyira cuki, hogy azonnal meg kell osztanom a barátaimmal is!', 1),
            ('Ó, de aranyos! Milyen bájos kis macska!', 2),
            ('Azonnal elolvadok ettől a kis aranyos fejétől!', 2),
            ('Ez a kép igazán megmutatja, mennyire szerethetőek és aranyosak tudnak lenni a cicák.', 2),
            ('A cicák ilyen bájosak, hogy az embernek nincs más választása, mint rajongani értük!', 3),
            ('Ez a kis cica olyan aranyos, hogy az ember rögtön megszeretné!', 3),
            ('Milyen bájos és szerethető kis állat ez a cica!', 3),
            ('Szegény cica 😥', 4),
            ('Mi így is imádunk téged!', 4),
            ('Gyönyörű kis cica így is! Number 1 Gaia fan vagyok!', 4),
            ('SáRkÁnYyYy!! 😱😱😱😱', 5),
            ('Hol van Hablaty? 🤔', 5),
            ('Mi van a kissárkányokkal? 😨', 5),
            ('Nemcsak gyönyörű, hanem nagyon okos is lehet ez a kis cica!', 6),
            ('Milyen macskát nézel te? 😂', 6),
            ('Őt sem az eszéért szeretjük 🥰', 6),
            ('Igazi sárkányharcos! 🐼', 7),
            ('Shifu mester büszkesége!', 7),
            ('Legendás harcos!', 7),
            ('Szimat!', 8),('Szimat!', 8),('Szimat!', 8),('Szimat!', 8),('Szimat!', 8),('Szimat!', 8),
            ('Ez olyan édes, hogy szinte elolvadok! 😍😍', 9),
            ('Egy ilyen aranyos kis macskát bárki szívesen magáénak tudna! 🥰', 9),
            ('Ez a kép teljesen elvarázsol és boldoggá tesz! 🥰', 9),
            ('Megmentelek én Tom elől!', 10),
            ('Fuss ameddig tudsz! - Tom', 10),
            ('Szerepet váltottatok? ....', 10)";
        if ($connection->query($query) === TRUE) {
            echo "Record inserted successfully<br>";
        } else {
            echo "Error creating record: " . $connection->error;
        }
        
        $connection -> close();
    ?>

</body>
</html>