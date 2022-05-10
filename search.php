<?php
//include auth_session.php file on all user panel pages
include "auth_session.php";
include "config.php";

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search - Ticket-Master</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/anims.css" />
    <link rel="stylesheet" href="css/dashboard.css" />
    <script src="https://kit.fontawesome.com/ad45f9ba34.js" crossorigin="anonymous"></script>
    <style>
        input[type=text] {
            border: 2px solid white;
            border-radius: 7px;
            width: 300px;

        }

    </style>
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

                    <div class="dd_menu" style="z-index: 1; position: absolute;">
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
            </ul>
        </div>
    </div>
    <div class="sidebar">
        <a href="search.php">
            <i title='Search' class="left-menu-icon fas fa-search"></i>
        </a>
        <a href="bookings.php">
            <i title='My Bookings' class="left-menu-icon fas fa-calendar-check"></i>
        </a>
        <a href="account_settings.php">
            <i title='Account Settings' class="left-menu-icon fas fa-cog"></i>
        </a>
        <a href="logout.php">
            <i title='Sign Out' class="left-menu-icon fas fa-sign-out-alt"></i>
        </a>
    </div>
    <div class="primary-container">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="ticket_booking.php?id=12&time=&theatre=">
                        <img src="images/bad_guys_scroll.webp" class="d-block w-100" alt="Bad Guys Ad">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="ticket_booking.php?id=10&time=&theatre=">
                        <img src="images/doctor_strange_scroll.webp" class="d-block w-100" alt="Doctor Strange Ad">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="ticket_booking.php?id=8&time=&theatre=">
                        <img src="images/jurasic_world_scroll.png" class="d-block w-100" alt="Jurasic World Dominion Ad">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="ticket_booking.php?id=10&time=&theatre=">
                        <img src="images/popcorn_scroll.jpg" class="d-block w-100" alt="Popcorn Ad">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="ticket_booking.php?id=7&time=&theatre=">
                        <img src="images/top_gun_scroll.webp" class="d-block w-100" alt="Top Gun Maverick Ad">
                    </a>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="primary-container">
        <div id="home-section-1" class="movie-show-container">
            <br />
            <h1><b>Search for a Movie</b></h1>


            <form action="search.php" method="POST">
                <input type="text" name="search" placeholder="search">
                <button type="submit" name="submit-search">Search</button>
            </form>

            <br>

            <div class="movie-container1">
                <div class="row g-4">
                    <?php

                    if(isset($_POST['submit-search'])) {

                        $search = mysqli_real_escape_string($conn, $_POST['search']);
                        $searchSQL = "SELECT * FROM movies WHERE movie_title LIKE '%$search%'   
                            OR movie_genre LIKE '%$search%' ";
                        $searchResult = mysqli_query($conn, $searchSQL);
                        $searchQueryResult = mysqli_num_rows($searchResult);

                        if($searchQueryResult > 0) {
                            while($row = mysqli_fetch_array($searchResult)) {

                                ?>
                                <div class="col">
                                    <div class="card" style="width: 30rem;">
                                        <div class="brightenEffect">
                                            <?php
                                            echo '<a href="ticket_booking.php?id=', $row["movie_id"], '&time=&theatre=">';
                                            echo '<img class="card-img-top" src="', $row["movie_img"], '" alt="Card image cap">';
                                            echo '</a>';
                                            ?>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            echo '<h5 class="card-title">', $row["movie_title"], "</h5>";
                                            echo '<p class="card-text">', $row["movie_genre"], "</p>";
                                            ?>
                                        </div>
                                        <p style="padding-left: 15px; margin-bottom: 0px; padding-bottom: 0px;"><b>Today's Showtimes</b></p>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                Theatre 1: Main Hall<br />
                                                <?php
                                                echo '<a href="ticket_booking.php?id=', $row["movie_id"], '&time=1900&theatre=1" class="btn btn-primary">7:00pm</a> ';
                                                echo '<a href="ticket_booking.php?id=', $row["movie_id"], '&time=2030&theatre=1" class="btn btn-primary">8:30pm</a> ';
                                                echo '<a href="ticket_booking.php?id=', $row["movie_id"], '&time=2100&theatre=1" class="btn btn-primary">9:00pm</a> ';
                                                ?>
                                            </li>
                                            <li class="list-group-item">
                                                Theatre 2: VIP Hall<br />
                                                <?php
                                                echo '<a href="ticket_booking.php?id=', $row["movie_id"], '&time=1900&theatre=2" class="btn btn-primary">7:00pm</a> ';
                                                echo '<a href="ticket_booking.php?id=', $row["movie_id"], '&time=2030&theatre=2" class="btn btn-primary">8:30pm</a> ';
                                                echo '<a href="ticket_booking.php?id=', $row["movie_id"], '&time=2100&theatre=2" class="btn btn-primary">9:00pm</a> ';
                                                ?>
                                            </li>
                                            <li class="list-group-item">
                                                Theatre 3: Private Hall<br />
                                                <?php
                                                echo '<a href="ticket_booking.php?id=', $row["movie_id"], '&time=1900&theatre=3" class="btn btn-primary">7:00pm</a> ';
                                                echo '<a href="ticket_booking.php?id=', $row["movie_id"], '&time=2030&theatre=3" class="btn btn-primary">8:30pm</a> ';
                                                echo '<a href="ticket_booking.php?id=', $row["movie_id"], '&time=2100&theatre=3" class="btn btn-primary">9:00pm</a> ';
                                                ?>
                                            </li>
                                        </ul>
                                        <div class="card-body">
                                            <?php echo '<a href="ticket_booking.php?id=', $row["movie_id"], '&time=&theatre=" class="card-link">See all theaters and showtimes...</a>'; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            // mysqli_free_result($result);
                        }
                    } ?>

                </div>
            </div>
            <br />
            <hr>

            <div class="movies-container2">
                <div class="row g-4">
                    <?php
                    if(isset($_POST['submit-search'])) {

                        $search2 = mysqli_real_escape_string($conn, $_POST['search']);
                        $searchSQL2 = "SELECT * FROM movies_cs WHERE movie_title LIKE '%$search2%'   
                            OR movie_genre LIKE '%$search2%' ";
                        $searchResult2 = mysqli_query($conn, $searchSQL2);
                        $searchQueryResult2 = mysqli_num_rows($searchResult2);

                        if($searchQueryResult2 > 0) {

                            echo "<h1><b>Coming Soon</b></h1>";
                            while($row = mysqli_fetch_array($searchResult2)) {
                                ?>
                                <div class="col">
                                    <div class="card" style="width: 30rem;">
                                        <div class="brightenEffect">
                                            <?php
                                            echo '<a href="ticket_booking.php?id=', $row["movie_id"], '&time=&theatre=">';
                                            echo '<img class="card-img-top" src="', $row["movie_img"], '" alt="Card image cap">';
                                            echo '</a>';
                                            ?>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            echo '<h5 class="card-title">', $row["movie_title"], "</h5>";
                                            echo '<p class="card-text">', $row["movie_genre"], "</p>";
                                            echo '<a href="ticket_booking.php?id=', $row["movie_id"], '&time=&theatre=" class="btn btn-primary"><i class="fa-solid fa-ticket"></i> Book Ahead</a>';
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo '<h4 class="no-annot">No results for upcoming movies.</h4>';
                        }
                    } else {
                    }

                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
            <hr>
            <br />
        </div>
    </div>
</div>

<footer>
    <div class="footer-bottom">
        <p>copyright &copy; <a href="dashboard.php">Ticket-Master</a> </p>
        <div class="footer-menu">
            <ul class="f-menu">
                <li><a href="about.php">About</a></li>
                <li><a href="contact_us.php">Contact</a></li>
            </ul>
        </div>
    </div>
</footer>
<script>
    var dd_main = document.querySelector(".dd_main");

    dd_main.addEventListener("click", function() {
        this.classList.toggle("active");
    })
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>