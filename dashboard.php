<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
include("config.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Dashboard - Client Area</title>
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
                        <img src="./images/profile-pic.png">

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
        <div class="sidebar">
            <i class="left-menu-icon fas fa-search"></i>
            <i class="left-menu-icon fas fa-home"></i>
            <i class="left-menu-icon fas fa-shopping-cart"></i>
        </div>
        <?php
        $sql = "SELECT * FROM movies";
        ?>
        <div id="home-section-1" class="movie-show-container">
            <h1>Now Playing</h1>

            <div class="movies-container">

                <?php
                if ($result = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        for ($i = 0; $i <= 4; $i++) {
                            $row = mysqli_fetch_array($result);
                            echo '<div class="movie-box">';
                            echo '<img src="' . $row['movie_img'] . '" alt=" "> ';
                            echo '<div class="movie-info ">';
                            echo '<h3>' . $row['movie_title'] . '</h3>';
                            echo '<a href="ticket_booking.php?id=' . $row['movie_id'] . '"><i class="fas fa-ticket-alt"></i> Book a seat</a>';
                            echo '</div>';
                            echo '</div>';
                        }
                        mysqli_free_result($result);
                    } else {
                        echo '<h4 class="no-annot">No Booking to our movies right now</h4>';
                    }
                } else {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }
                ?>
            </div>
            <h1> Coming Soon</h2>
            <div class="movies-container2">

                <?php
                $sql2 = "SELECT * FROM movies_cs";
                if ($result2 = mysqli_query($conn, $sql2)) {
                    if (mysqli_num_rows($result2) > 0) {
                        for ($i = 0; $i <= 4; $i++) {
                            $row = mysqli_fetch_array($result2);
                            echo '<div class="movie-box">';
                            echo '<img src="' . $row['movie_img'] . '" alt=" "> ';
                            echo '<div class="movie-info ">';
                            echo '<h3>' . $row['movie_title'] . '</h3>';
                            echo '<a href="ticket_booking.php?id=' . $row['movie_id'] . '"><i class="fas fa-ticket-alt"></i> Book a seat</a>';
                            echo '</div>';
                            echo '</div>';
                        }
                        mysqli_free_result($result2);
                    } else {
                        echo '<h4 class="no-annot">No Booking to our movies right now</h4>';
                    }
                } else {
                    echo "ERROR: Could not able to execute $sql2. " . mysqli_error($conn);
                }


                // Close connection
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
    <footer>
        <p> &copy; 2022 University of Georgia; All Rights Reserved<br>
        </p>
    </footer>
    <script>
        var dd_main = document.querySelector(".dd_main");

        dd_main.addEventListener("click", function() {
            this.classList.toggle("active");
        })
    </script>
</body>

</html>