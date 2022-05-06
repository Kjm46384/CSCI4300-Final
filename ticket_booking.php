<!DOCTYPE html>
<html lang="en">
<?php
include "auth_session.php";

$id = $_GET['id'];
$time = $_GET['time'];
$theatre = $_GET['theatre'];
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
    <script src="https://kit.fontawesome.com/ad45f9ba34.js" crossorigin="anonymous"></script>
    <title>Book <?php echo $row['movie_title']; ?> Now</title>
    <link rel="icon" type="image/png" href="img/logo.png">
</head>

<body style="background-image: linear-gradient(to bottom right, black , #57595D);">
    <div class="booking-panel">
        <div class="booking-panel-section booking-panel-section1">
            <h1>RESERVE YOUR SEAT</h1>
        </div>
        <div class="booking-panel-section booking-panel-section2" onClick="location.href='dashboard.php'">
            <i class="fas fa-2x fa-times rounded"></i>
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
                        <option value="" disabled <?php if($theatre=="") {echo 'selected';} ?>>THEATRE</option>
                        <option value="main-hall" <?php if($theatre=="1") {echo 'selected';} ?>>Main Hall</option>
                        <option value="vip-hall" <?php if($theatre=="2") {echo 'selected';} ?>>VIP Hall</option>
                        <option value="private-hall" <?php if($theatre=="3") {echo 'selected';} ?>>Private Hall</option>
                    </select>

                    <select name="showtime" required>
                        <option value="" disabled <?php if($time=="") {echo 'selected';} ?>>TIME</option>
                        <option value="1930" <?php if($time=="1900") {echo 'selected';} ?>>7:00 PM</option>
                        <option value="2030" <?php if($time=="2030") {echo 'selected';} ?>>8:30 PM</option>
                        <option value="2100" <?php if($time=="2100") {echo 'selected';} ?>>9:00 PM</option>
                    </select>

                    <input type="date" id="start" name="beginning_date" min="2022-01-01" max="9999-12-31" <?php if($time!="") {echo 'value="'; $currentDate = new DateTime(); echo $currentDate->format('Y-m-d'); echo '"';} ?>>

                    <select name="type" required>
                        <option value="" disabled selected>TYPE</option>
                        <option value="2d">2D</option>
                        <option value="imax">IMAX</option>
                    </select>

                    <input placeholder="Number of Tickets" id="12.50"  type="number">
                
                    <br>

                    <button type="submit" value="submit" name="submit" class="form-btn"><i class="fa-solid fa-book-open"></i><b> Book Now</b></button>
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