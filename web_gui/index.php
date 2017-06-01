<?php
session_start();
include "config.php";

// If we are receiving a password via POST method
if (!empty($_POST["password"])) {

    if ($uipassword == hash("sha256", $_POST["password"])) {

        $_SESSION["password"] = $_POST["password"];
        header("location: ui.php");
        exit;
    }

}

if (!isset($_SESSION['password'])) {
    // If password value is empty
    if ($uipassword == "") {
        $_SESSION["password"] = "NULL";
        header("location: ui.php");
        exit;
    }

    if (basename($_SERVER['PHP_SELF']) != "index.php") {
        header("location: index.php");
        exit;
    } else {
        echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Daikin Login</title>

    <!-- Common plugins -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>

<div class="misc-wrapper">
    <div class="misc-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <div class="misc-box">
                        <p class="text-center text-uppercase pad-v">Login to continue.</p>
                        <form role="form" action="index.php" method="post">

                            <div class="form-group">
                                <label class="text-muted" for="password">Password</label>
                                <div class="group-icon">
                                    <input id="password" name="password" type="password" placeholder="Password"
                                           class="form-control" required="">
                                    <span class="icon-lock text-muted icon-input"></span>
                                </div>
                            </div>
                            <div class="clearfix">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-block btn-primary"> Login </button>
                                </div>
                            </div>
                            <hr>
                        </form>
                    </div>
                    <div class="text-center misc-footer">
                        <span>&copy; Copyright 2017</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Common plugins-->
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
        ';

    }
}

?>

