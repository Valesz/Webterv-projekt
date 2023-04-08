<html>
    <head>
        <title>Delete RegisteredUsers Database</title>
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
            
            $query = "DROP DATABASE RegisteredUsers";
            if ($connection->query($query) === TRUE) {
                echo "Database deleted successfully";
            } else {
                echo "Error deleting database: " . $connection->error;
            }

            $connection->close();
        ?>
    </body>
</html>