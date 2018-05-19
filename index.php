<!DOCTYPE html>
<html lang="en" class=" js cssanimations csscalc cssvhunit">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Webifiy</title>
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

<body>
<div class="container">
<?php
error_reporting(0);
session_start();
    $_SESSION['NavBar'] = [
        "title" => "One place for all Awesome Stores on the Web",
        "nextPageTitle" => "Add a new awesome store.",
        "nextPageLink" => "new_store.php"
    ];
    require('navigation.php');
    session_unset();
    ?>
    <div style="padding-top: 15%; margin-left: 5%; margin-right: 5%">
    <div class="ui grid" style="text-align: center">
        <div class="two column row">
            <div class="column">
                <div class="ui card">
                    <a class="image" href="new_store.php">
                        <img src="img/Store-home.png" width="300">
                    </a>
                    <div class="content">
                        <a class="header" href="new_store.php"><strong>Add a new Store</strong></a><strong> || </strong><a class="header" href="stores.php"><strong>See list of all Stores</strong></a><strong> || </strong><a class="header" href="new_product.php"><strong>Add a new Product</strong></a>
                        <div class="meta">
                            <hr>
                        </div>
                    </div>
                </div>
            </div>

            <div class="column">
                <h1>
                    Webifiy - An online platform to manage your e-commerce store in the most efficient way.
                </h1>
                <hr>
            </div>
        </div>
    </div>
    </div>
</div>
<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/semantic.min.js"></script>
<script src="js/classie.js"></script>
<script src="js/selectFx.js"></script>
<script src="js/fullscreenForm.js"></script>
</body>
</html>