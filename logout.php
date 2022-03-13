<?php
    session_start();

    // Delete cookies associated with user
    // cookie is destroyed by setting expiration date to past
    setcookie("user", "", time() - 3600);

    // Destroy session
    if(session_destroy()) {
        // Redirecting To Home Page
        header("Location: index.php");
    }
?>