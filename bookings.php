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
    <title>My Bookings - Ticket-Master</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/anims.css" />
    <link rel="stylesheet" href="css/dashboard.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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

                        <div class="dd_menu" style="z-index: 9; position: absolute;">
                            <div class="dd_left">
                                <ul>
                                    <a href="account_settings.php"><li><i class="fas fa-cog"></i></li></a>
                                    <a href="logout.php"><li><i class="fas fa-sign-out-alt"></i></li></a>
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
            <br />
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
                <i title='Sign Out'class="left-menu-icon fas fa-sign-out-alt"></i>
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
        <?php
        $username = $_COOKIE['user'];
        $sql = "SELECT * FROM bookingtable WHERE username = '$username' ORDER BY id;";
        ?>
        <div class="primary-container">
            <div id="home-section-1" class="movie-show-container">
                <br />
                <h1><b>My Bookings</b></h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Movie</th>
                            <th scope="col">Theatre</th>
                            <th scope="col">Type</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Order Number</th>
                            <th scope="col">Payment Status</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($result = mysqli_query($conn, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            for ($i = 0; $i <= mysqli_num_rows($result) - 1; $i++) {
                                $row = mysqli_fetch_array($result); ?>
                                <tr>
                                    <th scope="row"><?php echo $i + 1; ?></th>
                                    <td><?php echo $row["movieTitle"]; ?></td>
                                    <td><?php $theatre = $row["theatre"]; if ($theatre == 'main-hall') { echo "Main Hall"; } else if ($theatre == 'vip-hall') { echo "VIP Hall"; } else if ($theatre == 'private-hall') { echo "Private Hall"; } ?></td>
                                    <td><?php echo $row["type"]; ?></td>
                                    <td><?php echo $row["bookingDate"]; ?></td>
                                    <td><?php $showtime = $row["showtime"]; if ($showtime == '1900') { echo "7:00pm"; } else if ($showtime == '2030') { echo "8:30pm"; } else if ($showtime == '2100') { echo "9:00pm"; } ?></td>
                                    <td><?php echo $row["quantity"]; ?></td>
                                    <td>#<?php echo $row["id"]; ?></td>
                                    <td><?php $hasPayed = $row["hasPayed"]; if ($hasPayed == 1) { echo '<i style="color: green;" class="fa-regular fa-circle-check"> <div style="font-family: \'Jost\', sans-serif; display: inline;">Payment Confirmed</div></i>'; } else { echo '<i style="color: red;" class="fa-regular fa-circle-xmark"></i> <a href="payment.php?order='; echo $row["id"]; echo '"><button type="button" class="btn btn-outline-primary btn-sm">Click to Pay Now</button></a>';} ?></td>
                                    <td><a href="deletebooking.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-outline-danger btn-sm">Cancel Booking</button></a></td>
                                </tr>
                            <?php
                            }
                            mysqli_free_result($result);
                        }
                        else {
                            echo '<br /><h3>No bookings found.</h3><br />';
                        }
                    }
                    else {
                        echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
                    }
                    ?>
                    </tbody>
                </table>
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