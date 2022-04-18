<?php
//include auth_session.php file on all user panel pages
include "auth_session.php";
include "config.php";
?>
<div style="text-align:center;">
    <h1>Thank you!</h1>
    <p>Your submission has been received.</p>
    <p>This page will redirect in <span id="timer"></span>s.</p>
</div>
<script type="text/javascript">
    var count = 5;
    var redirect = "dashboard.php";

    function countDown() {
        if (count >= 0) {
            document.getElementById("timer").innerHTML = count--;
            setTimeout("countDown()", 1000);
        } else {
            window.location.href = redirect;
        }
    }
    countDown();
</script>