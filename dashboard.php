<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="css/dashboard.css" />
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="navbar">
            <div class="logo">
                <a href="dashboard.php">Ticket-Master</a>
            </div>
            <div class="nav_right">
                <ul>
                    <li class="nr_li dd_main">
                        <img src="./images/profile-pic.png" >

                        <div class="dd_menu">
                            <div class="dd_left">
                                <ul>
                                    <li><i class="fas fa-cog"></i></li>
                                    <li><i class="fas fa-sign-out-alt"></i></li>
                                </ul>
                            </div>
                            <div class="dd_right">
                                <ul>
                                    <li> <a href="account_settings.php">
                                            <p> Settings</p>
                                        </a> </li>
                                    <li> <a href="logout.php">
                                            <p>Logout</p>
                                        </a> </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        var dd_main = document.querySelector(".dd_main");

        dd_main.addEventListener("click", function() {
            this.classList.toggle("active");
        })
    </script>
</body>

</html>