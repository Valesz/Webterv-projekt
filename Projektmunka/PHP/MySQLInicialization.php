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
            ('Szimat', 'Szimat.jpg', 'Szimat a minden, a megváltó, a prog 1 gyakvez, a dékán, és még te is!', 'Szimat!|Szimat!|Szimat!|Szimat!|Szimat!|Szimat!'),
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