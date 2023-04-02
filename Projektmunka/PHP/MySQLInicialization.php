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


        $dbname='Macskalak';
        $connection=new mysqli($servername, $username, $password, $dbname);
        if ($connection -> connect_error) {
            die("connection error: " . $connection->connect_error);
        }

        $query = "CREATE TABLE forum (
            name VARCHAR(30) NOT NULL,
            imgName VARCHAR(30) NOT NULL PRIMARY KEY,
            description VARCHAR(100),
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
            ('Fogatlan', 'Fogatlan.jpg', 'Segítség elhagytam a Hablatyomat, és nem tudom merre van a haza!', 'SáRkÁnYyYy!! 😱😱😱😱|Hol van Hablaty? 🤔|Mi van a kissárkányokkal? 😨'),
            ('Po', 'Po.jpg', 'Sárkányharcosunk keresi elveszett gazdáját!', 'Igazi sárkányharcos! 🐼|Shifu mester büszkesége!|Legendás harcos!'),
            ('Karcsi', 'Karcsi.jpg', 'A \"legokosabb\" macska gazdáját keresi... Kedvenc tevékenysége a fal bámulása, és az indokolatlan nyávogás', 'Nemcsak gyönyörű, hanem nagyon okos is lehet ez a kis cica!|Milyen macskát nézel te? 😂|Őt sem az eszéért szeretjük 🥰'),
            ('Gaia', 'Gaia.jpg', 'Gaia nehéz időszakon ment keresztül, ezért szeretetteljes és befogadó környezetre vágyik.', 'Szegény cica 😥|Mi így is imádunk téged!|Gyönyörű kis cica így is! Number 1 Gaia fan vagyok!'),
            ('Igor', 'Igor.jpg', 'Igor a tekintetével a gonoszt is kiűzi a lelkedből! Démonűző gazdáját keresi.', 'A cicák ilyen bájosak, hogy az embernek nincs más választása, mint rajongani értük!|Ez a kis cica olyan aranyos, hogy az ember rögtön megszeretné!|Milyen bájos és szerethető kis állat ez a cica!'),
            ('Günter', 'Gunter.jpg', 'Günter egy játékos macska, így mellette lehetetlen az unatkozás!', 'Ó, de aranyos! Milyen bájos kis macska!|Azonnal elolvadok ettől a kis aranyos fejétől!|Ez a kép igazán megmutatja, mennyire szerethetőek és aranyosak tudnak lenni a cicák.'),
            ('Rafiki', 'Rafiki.jpg', 'A méltóságteljes Rafiki keresi a nyugodtabb cicára vágyó leendő gazdáját!', 'Nagyon aranyos cica 😍|Mint egy igazi oroszlán 😎|Ez a kép annyira cuki, hogy azonnal meg kell osztanom a barátaimmal is!')";
        if ($connection->query($query) === TRUE) {
            echo "Record inserted successfully<br>";
        } else {
            echo "Error creating record: " . $connection->error;
        }
        
        $connection -> close();
    ?>

</body>
</html>