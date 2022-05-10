<?php
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Contact Us - Ticket-Master</title>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css" />
  <link rel="stylesheet" href="css/contact.css">
</head>

<body>
  <div class="container">
    <h1 class="brand"><span>Ticket</span> Master</h1>
    <div class="wrapper">
      <div class="company-info">
        <h3>Ticket-Master</h3>
        <ul>
          <li><i class="fa fa-road"></i> Boyd Graduate Studies Research Center, D. W. Brooks Drive, Athens, GA 30602</li>
          <li><i class="fa fa-phone"></i> (706) 542-2911</li>
          <li><i class="fa fa-envelope"></i> test@ticketmaster.test</li>
        </ul>
      </div>
      <div class="contact">
        <h3>Email Us</h3>
        <div class="alert">Your message has been sent</div>
        <form id="contactForm" method="POST" action="submission.php">
          <p>
            <label>Name</label>
            <input type="text" name="name" id="name" required>
          </p>
          <p>
            <label>Email Address</label>
            <input type="email" name="email" id="email" required>
          </p>
          <p>
            <label>Phone Number</label>
            <input type="text" name="phone" id="phone">
          </p>
          <p class="full">
            <label>Message</label>
            <textarea name="message" rows="5" id="message"></textarea>
          </p>
          <p class="full">
            <button type="submit">Submit</button>
          </p>
        </form>
      </div>
    </div>
  </div>

  <script src="https://www.gstatic.com/firebasejs/4.3.0/firebase.js"></script>
  <script src="main.js"></script>
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