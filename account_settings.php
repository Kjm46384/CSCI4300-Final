<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Account Settings - Ticket-Master</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<p class='white-text-large'>
    <?php
    // echo $_SESSION['username'];
    // example using cookie
    echo $_COOKIE['user'];
    ?>'s Account Settings
</p>
<p class='link'>Go back to <a href='dashboard.php'>Dashboard</a></p>
<?php
require('config.php');
include("auth_session.php");

$username = $_COOKIE['user'];

// When form submitted, check and create user session.
if ( isset($_POST['new_password']) && isset($_POST['current_password']) ) {

    $new_password = stripslashes($_REQUEST['new_password']);    // removes backslashes
    $new_password = mysqli_real_escape_string($conn, $new_password);

    $current_password = stripslashes($_REQUEST['current_password']);    // removes backslashes
    $current_password = mysqli_real_escape_string($conn, $current_password);

    // Verify if password corresponds to user.
    $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($current_password) . "'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $rows = mysqli_num_rows($result);

    // if 'current password' is entered correctly, continue
    if ($rows == 1) {
        while($row = mysqli_fetch_array($result)){
            $current_password = $row['password'];
        }

        // if 'new password' is not equal to the 'current password' and is not empty, change password
        if ( md5($new_password) != $current_password && $new_password != "" ) {
            $sql_edit_password = "UPDATE `users` SET `password`='" . md5($new_password) . "' WHERE `username`='$username'";

            $change_password = mysqli_query($conn,$sql_edit_password);

            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3 class='white-text'>Invalid password: Matches old password or does not fit requirements.</h3><br/>
                  <p class='link'>Go back to<a href='account_settings.php'>Account Settings</a> again.</p>
                  </div>";
        }

    } else {
        echo "<div class='form'>
                  <h3 class='white-text'>Incorrect password.</h3><br/>
                  <p class='link'>Go back to<a href='account_settings.php'>Account Settings</a> again.</p>
                  </div>";
    }
} else {
    ?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Change Password</h1>
        <input type="password" class="login-input" name="new_password" placeholder="New Password" autofocus="true"/>
        <input type="password" class="login-input" name="current_password" placeholder="Current Password"/>
        <input type="submit" value="Update" name="submit" class="login-button"/>
    </form>
    <?php
}
?>
</body>
</html>
