<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Delete Database</title>
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
            
            $query = "DROP DATABASE Macskalak";
            if ($connection->query($query) === TRUE) {
                echo "Database deleted successfully<br>";
            } else {
                echo "Error deleting database: " . $connection->error;
            }

            $connection->close();
        ?>
    </body>
</html>