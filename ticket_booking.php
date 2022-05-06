<!DOCTYPE html>
<html lang="en">
<?php
include "auth_session.php";

$id = $_GET['id'];
$link = mysqli_connect("localhost", "root", "", "movie_database");
if($id <= 6)
{
	$movieQuery = "SELECT * FROM movies WHERE movie_id = $id";
	$movieImageById = mysqli_query($link, $movieQuery);
	$row = mysqli_fetch_array($movieImageById);
}
else if ($id > 6)
{
	$movieQuery = "SELECT * FROM movies_cs WHERE movie_id = $id";
	$movieImageById = mysqli_query($link, $movieQuery);
	$row = mysqli_fetch_array($movieImageById);
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible">
    <link rel="stylesheet" href="css/booking.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Book <?php echo $row['movie_title']; ?> Now</title>
    <link rel="icon" type="image/png" href="img/logo.png">
</head>

<body style="background-color:black;">
    <div class="booking-panel">
        <div class="booking-panel-section booking-panel-section1">
            <h1>RESERVE YOUR SEAT</h1>
        </div>
        <div class="booking-panel-section booking-panel-section2" onClick="location.href='dashboard.php'">
            <i class="fas fa-2x fa-times"></i>
        </div>
        <div class="booking-panel-section booking-panel-section3">
            <div class="movie-box">
                <?php
                echo '<img src="' . $row['movie_img'] . '" alt="">';
                ?>
            </div>
        </div>
        <div class="booking-panel-section booking-panel-section4">
            <div class="title"><?php echo $row['movie_title']; ?></div>
            <div class="movie-information">
                <table>
                    <tr>
                        <td>GENRE</td>
                        <td><?php echo $row['movie_genre']; ?></td>
                    </tr>
                    <tr>
                        <td>DURATION</td>
                        <td><?php if($row['movie_duration']=="TBA") {echo $row['movie_duration'];} else {echo $row['movie_duration']; echo ' minutes';} ?></td>
                    </tr>
                    <tr>
                        <td>RELEASE DATE</td>
                        <td><?php echo $row['movie_release_date']; ?></td>
                    </tr>
                </table>
            </div>
            <div class="booking-form-container">
                <form action="payment.php" method="POST">

                    <select name="theatre" required>
                        <option value="" disabled selected>THEATRE</option>
                        <option value="main-hall">Main Hall</option>
                        <option value="vip-hall">VIP Hall</option>
                        <option value="private-hall">Private Hall</option>
                    </select>

                    <select name="type" required>
                        <option value="" disabled selected>TYPE</option>
                        <option value="2d">2D</option>
                        <option value="imax">IMAX</option>
                    </select>

                    <input type="date" id="start" name="beginning_date" min="2022-01-01" max="9999-12-31">

                    <select name="showtime" required>
                        <option value="" disabled selected>TIME </option>
                        <option value="09-00">7:30 PM</option>
                        <option value="12-00">8:30 PM</option>
                        <option value="15-00">9:00 PM</option>
                    </select>
                    <input  placeholder="Number of Tickets" id="12.50"  type="number">
                
                    <br>

                    <button type="submit" value="submit" name="submit" class="form-btn">Book Now</button>
                     <?php

                    

                    // if (isset($_POST['submit'])) {

                    //     $insert_query = "INSERT INTO 
                    //     bookingTable (  movieName,
                    //                     bookingTheatre,
                    //                     bookingType,
                    //                     bookingDate,
                    //                     bookingTime)
                    //     VALUES (        '" . $row['movieTitle'] . "',
                    //                     '" . $_POST["theatre"] . "',
                    //                     '" . $_POST["type"] . "',
                    //                     '" . $_POST["date"] . "',
                    //                     '" . $_POST["showtime"] . "',)";
                    //     mysqli_query($link, $insert_query);
                    // }
                    ?> -->
                </form>
            </div>
        </div>
    </div>

    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>

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
</body>
</html>