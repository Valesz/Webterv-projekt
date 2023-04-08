<html>
<head>
    <title>MySQL RegisteredUsers</title>
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

        $query = "CREATE DATABASE RegisteredUsers";
        if ($connection->query($query) === TRUE) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . $connection->error;
        }
    
        $connection->close();

        $dbname="UserData";
        $connection=new mysqli($servername, $username, $password, $dbname);
        if ($connection -> connect_error) {
            die("connection error: " . $connection->connect_error);
        }

        $query = "CREATE TABLE UserData (
            id INT NOT NULL UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(35) NOT NULL,
            email VARCHAR(70) NOT NULL,
            password VARCHAR(100) NOT NULL
        )";

        if ($connection->query($query) === TRUE) {
            echo "Table UserData created successfully";
        } else {
            echo "Error creating table: " . $connection->error;
        }

        $query = "INSERT INTO UserData (id, username, email, password)
        VALUES 
        ('1', 'admin', 'admin@admin.hu', admin),
        ('2', 'testuser', testuser@testuser.hu, testuser123)
        ";

        $connection->close();
    ?>
</body>
</html>