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
    <title>Dashboard - Client Area</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/anims.css" />
    <link rel="stylesheet" href="css/dashboard.css" />
    <script src="https://kit.fontawesome.com/ad45f9ba34.js" crossorigin="anonymous"></script>
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
            <a href="#">
                <i class="left-menu-icon fas fa-search"></i>
            </a>
            <a href="#">
                <i class="left-menu-icon fas fa-home"></i>
            </a>
            <a href="#">
                <i class="left-menu-icon fas fa-shopping-cart"></i>
            </a>
        </div>
        <?php $sql = "SELECT * FROM movies"; ?>
<div class="primary-container">
        <div id="home-section-1" class="movie-show-container">
            <br />
            <h1><b>Now Playing</b></h1>
<div class="movie-container1">
    <div class="row g-4">
        <?php if ($result = mysqli_query($conn, $sql))
{
    if (mysqli_num_rows($result) > 0)
    {
        for ($i = 0;$i <= mysqli_num_rows($result) - 1;$i++)
        {
            $row = mysqli_fetch_array($result); ?>
                    <div class="col">
                        <div class="card" style="width: 30rem;">
                            <div class="brightenEffect">
                            <?php
            echo '<a href="ticket_booking.php?id=', $row["movie_id"], '">';
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
                            <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                            Theater 1<br />
                            <?php
            echo '<a href="ticket_booking.php?id=', $row["movie_id"], '&time=700pm&theater=1" class="btn btn-primary">7:00pm</a> ';
            echo '<a href="ticket_booking.php?id=', $row["movie_id"], '&time=830pm&theater=1" class="btn btn-primary">8:30pm</a> ';
            echo '<a href="ticket_booking.php?id=', $row["movie_id"], '&time=900pm&theater=1" class="btn btn-primary">9:00pm</a> ';
?>
                            </li>
                            <li class="list-group-item">
                            Theater 2<br />
                            <?php
            echo '<a href="ticket_booking.php?id=', $row["movie_id"], '&time=700pm&theater=2" class="btn btn-primary">7:00pm</a> ';
            echo '<a href="ticket_booking.php?id=', $row["movie_id"], '&time=830pm&theater=2" class="btn btn-primary">8:30pm</a> ';
            echo '<a href="ticket_booking.php?id=', $row["movie_id"], '&time=900pm&theater=2" class="btn btn-primary">9:00pm</a> ';
?>
                            </li>
                            <li class="list-group-item">
                            Theater 3<br />
                            <?php
            echo '<a href="ticket_booking.php?id=', $row["movie_id"], '&time=700pm&theater=3" class="btn btn-primary">7:00pm</a> ';
            echo '<a href="ticket_booking.php?id=', $row["movie_id"], '&time=830pm&theater=3" class="btn btn-primary">8:30pm</a> ';
            echo '<a href="ticket_booking.php?id=', $row["movie_id"], '&time=900pm&theater=3" class="btn btn-primary">9:00pm</a> ';
?>
                            </li>
                            </ul>
                            <div class="card-body">
                            <?php echo '<a href="ticket_booking.php?id=', $row["movie_id"], '" class="card-link">See all theaters and showtimes...</a>'; ?>
                            </div>
                            </div>
                            </div>
                            <?php
        }
        mysqli_free_result($result);
    }
    else
    {
        echo '<h4 class="no-annot">No Booking to our movies right now</h4>';
    }
}
else
{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
} ?>

    </div>
</div>
<br />
<hr>
            <h1><b>Coming Soon</b></h1>
            <div class="movies-container2">
                <div class="row g-4">
                <?php
$sql2 = "SELECT * FROM movies_cs";
if ($result2 = mysqli_query($conn, $sql2))
{
    if (mysqli_num_rows($result2) > 0)
    {
        for ($i = 0;$i <= mysqli_num_rows($result2) - 1;$i++)
        {
            $row = mysqli_fetch_array($result2); ?>
                            <div class="col">
                            <div class="card" style="width: 30rem;">
                            <div class="brightenEffect">
                            <?php
            echo '<a href="ticket_booking.php?id=', $row["movie_id"], '">';
            echo '<img class="card-img-top" src="', $row["movie_img"], '" alt="Card image cap">';
            echo '</a>';
?>
                            </div>
                            <div class="card-body">
                            <?php
            echo '<h5 class="card-title">', $row["movie_title"], "</h5>";
            echo '<p class="card-text">', $row["movie_genre"], "</p>";
            echo '<a href="ticket_booking.php?id=', $row["movie_id"], '" class="btn btn-primary"><i class="fa-solid fa-ticket"></i> Book Ahead</a>';
?>
                            </div>
                            </div>
                            </div>
                            <?php
        }
        mysqli_free_result($result2);
    }
    else
    {
        echo '<h4 class="no-annot">No Booking to our movies right now</h4>';
    }
}
else
{
    echo "ERROR: Could not able to execute $sql2. " . mysqli_error($conn);
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
        <p> &copy; 2022 University of Georgia; All Rights Reserved<br />
        </p>
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
