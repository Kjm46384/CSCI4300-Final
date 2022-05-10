<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Registration - Ticket-Master</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    	$(document).ready(function()
    	{
    		$("#show-password").click(function()
    		{
    			if($("#password").attr("type")=="password")
    			{
    				$("#password").attr("type","text");
    			}
    			else
    			{
    				$("#password").attr("type","password");
    			}
    		});
    	});
    </script>
</head>

<body>
    <?php
    require('config.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($conn, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($conn, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($conn, $query);
        if ($result) {
            echo "<div class='form'>
                  <h1 class='login-title'>You are registered successfully.</h1><br/>
                  <p class='link'>Click here to <a href='index.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h1 class='login-title'>Required fields are missing.</h1><br/>
                  <p class='link'>Click here to <a href='register.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
    ?>
        <form class="form" action="" method="post">
            <h1 class="login-title">Registration</h1>
            <input type="text" class="login-input" name="username" placeholder="Username" required />
            <input type="text" class="login-input" name="email" placeholder="Email Adress">
            <input type="password" class="login-input" name="password" placeholder="Password" id="password">
            <input id="show-password" type="checkbox" /><label for="checkbox">Show Password</label>
            <p></p>
            <input type="submit" name="submit" value="Register" class="login-button">
            <p class="link"><a href="index.php">Click to Login</a></p>
        </form>
    <?php
    }
    ?>
</body>

</html>