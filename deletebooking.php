<?php
$id = $_GET['id'];
$link = mysqli_connect("localhost", "root", "", "movie_database");
$deleterow = mysqli_query($link, "DELETE FROM bookingtable WHERE id = '$id'");
if($deleterow !== FALSE)
{
	header("Location: bookings.php");
	exit();
} else{
	echo("<b>Error:</b> There was a problem canceling the booking. Please try again.");
}
?>