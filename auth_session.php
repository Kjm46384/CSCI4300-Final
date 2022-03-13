<?php
    session_start();

    // If the there is no session or cookie, then there is no user
    // logged on. Go to login page.
    if(!isset($_SESSION["username"]) || !isset($_COOKIE["user"]) ) {
        header("Location: index.php");
        exit();
    }
?>