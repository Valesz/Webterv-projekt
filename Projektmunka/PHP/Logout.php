<?php
    session_start();

    setcookie("userID", 0, time() - 360000, "/");
    session_unset();
    session_destroy();
    header("location: ../Bejelentkezes.php");
?>