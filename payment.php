<?php
include "auth_session.php";
include "config.php";
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css/payment.css" />
<script type="text/javascript" src="javascript/script.js"></script>

<html>

<head>
    <title>Checkout</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-k2/8zcNbxVIh5mnQ52A0r3a6jAgMGxFJFE2707UxGCk= sha512-ZV9KawG2Legkwp3nAlxLIVFudTauWuBpC10uEafMHYL0Sarrz5A7G79kXh5+5+woxQ5HM559XX2UZjMJ36Wplg==" crossorigin="anonymous">
</head>

<body style="font-family: 'Open Sans', sans-serif;">
    <div class="container">
        <div class="centered title">
            <h1>Welcome to our checkout.</h1>
        </div>
    </div>
    <hr class="featurette-divider">
    </hr>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="tab-content">
                    <div id="stripe" class="tab-pane fade in active">
                        <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
                        <form accept-charset="UTF-8" action="submit_payment.php" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_bQQaTxnaZlzv4FnnuZ28LFHccVSaj" id="payment-form" method="post">
                            <div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓" /><input name="_method" type="hidden" value="PUT" /><input name="authenticity_token" type="hidden" value="qLZ9cScer7ZxqulsUWazw4x3cSEzv899SP/7ThPCOV8=" /></div>
                            <br>
                            <div class='form-row'>
                                <div class='form-group required'>
                                    <div class='error form-group hide'>
                                        <div class='alert-danger alert'>
                                            Please correct the errors and try again.

                                        </div>
                                    </div>
                                    <label class='control-label'>Name on Card</label>
                                    <input required class='form-control' size='4' type='text'>
                                </div>

                            </div>
                            <div class='form-row'>
                                <div class='form-group card required'>
                                    <label class='control-label'>Card Number</label>
                                    <input required autocomplete='off' class='form-control card-number' size='20' type='text'>
                                </div>
                            </div>
                            <div class='form-row'>
                                <div class='form-group card required'>
                                    <label class='control-label'>Billing Address</label>
                                    <input required autocomplete='off' class='form-control' size='20' type='text'>
                                </div>
                            </div>
                            <div class='form-row'>
                                <div class='form-group cvc required'>
                                    <label class='control-label'>CVC</label>
                                    <input required autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                                </div>
                                <div class='form-group expiration required'>
                                    <label class='control-label'>Expiration</label>
                                    <input required class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                                </div>
                                <div class='form-group expiration required'>
                                    <label class='control-label'>Year</label>
                                    <input required class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                                </div>
                            </div>


                            <div class='form-row'>
                                <div class='form-group'>
                                    <label class='control-label'></label>

                                    <button style="margin:5px;" class='form-control btn btn-primary' type='submit'> Continue →</button>
                                    <button  onclick="window.history.back('-100')" style="margin:5px;" class='form-control btn btn-secondary'> ← Cancel </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <label class='control-label'></label>
            </div>
            <div id="myModal" class="modal fade">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="icon-box">
                                <i class="material-icons">&#xE876;</i>
                            </div>
                            <h4 class="modal-title w-100">Awesome!</h4>
                        </div>
                        <div class="modal-body">
                            <p class="text-center">Your booking has been confirmed.</p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
                        </div>
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