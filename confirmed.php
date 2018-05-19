<?php
error_reporting(0);
// start the session
session_start();

// check if the session variables are NOT empty
if (!empty($_SESSION['success'])) {
    // if there is a success message
    $class = 'success';
    $message = $_SESSION['success'];
} else if (!empty($_SESSION['fail'])) {
    // if there is a fail message
    $class = 'danger';
    $message = $_SESSION['fail'];
} else {
    // user has arrived to this page accidentally
    // redirect the user to stores
    header('Location: stores.php');
}

// clear the session variables
session_unset();

?>
<!DOCTYPE html>
<html lang="en" class=" js cssanimations csscalc cssvhunit">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Webifiy - Confirmation Page</title>
    <meta name="description" content="The ultimate platform to host your e-commerce store online.">
    <meta name="keywords" content="e-commerce, Webifiy, store, product, shop">
    <meta name="author" content="Pranav-o-Websphere">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/component.css">
    <link rel="stylesheet" type="text/css" href="css/cs-select.css">
    <link rel="stylesheet" type="text/css" href="css/cs-skin-boxes.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <script type="text/javascript" async="" src="js/ga.js"></script>
    <script src="js/modernizr.custom.js"></script>

    <style>
        body {
            background-color: #00BFFF;
        }

        fieldset {
            border: none;
        }

        .well {
            min-height: 20px;
            padding: 19px;
            margin-bottom: 20px;
            background-color: rgba(0, 0, 0, 0.3);
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05)
        }

        .fs-numbers {
            top: 10px;
            right: 10px;
            margin: 50px;
        }

        input {
            background-color: #1b6d85;
        }

    </style>
<body>
<div class="container">

    <div class="fs-form-wrap" id="fs-form-wrap">
        <div class="fs-title">
            <h1 class="well">Webifiy -
                <small style="font-size: 20px"> Confirmation Page</small>
            </h1>
            <div class="codrops-top">
                <a class="codrops-icon codrops-icon-prev"
                   href="index.php"><span><br>Home</span><span class="fa fa-home"></span></a>
                <a class="codrops-icon codrops-icon-drop"
                   href="stores.php"><span><br>All Stores</span><span class="fa fa-th-list"></span></a>
                <a class="codrops-icon codrops-icon-info" href="new_product.php"><span><br>Add a new product  to an existing store.</span><span
                        class="fa fa-plus"></span></a>
            </div>
        </div> <br><br><br><br><br><br><br><br><br><br><br><br>

    <div id="hellWithThis" class="well alert alert-<?= $class ?>">
        <?= strip_tags($message) ?>
    </div>


</div>
<script src="https://code.jquery.com/jquery-2.2.3.min.js"
        integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
</body>

</html>