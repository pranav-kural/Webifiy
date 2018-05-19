<?php

// connect to database
require ( 'db_connect.php' );

// the SQL statement for fetching data from the stores table
$store_sql = 'SELECT * FROM tblstores WHERE storeId = :id';

// assign the GET param to a variable
$store_id = $_GET['id'];

// prepare the SQL statement
$store_sth = $dbh->prepare( $store_sql );

// fill the placeholders
$store_sth->bindParam( ':id', $store_id, PDO::PARAM_INT );

// execute the artist SQL
$store_sth->execute();

// store the result
$store = $store_sth->fetch();

// close the cursor so we can execute the next statement
$store_sth->closeCursor();

$products_sql = "SELECT * FROM tblproducts WHERE storeId = :id";

$products_sth = $dbh->prepare( $products_sql );

// fill the placeholders
$products_sth->bindParam( ':id', $store_id, PDO::PARAM_INT );

$products_sth->execute();

// store the results
$products = $products_sth->fetchAll();

// count the number of rows returned
$row_count = $products_sth->rowCount();

// close the connection
$dbh = null;

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="The ultimate platform to host your e-commerce store online.">
    <meta name="keywords" content="e-commerce, Webifiy, store, product, shop">
    <meta name="author" content="Pranav-o-Websphere">
    <link rel="stylesheet" type="text/css" href="css/semantic.min.css">
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
    <title><?= $store['storeName'] ?> - Products</title>
</head>
<body>

<div class='container'>
<?php
error_reporting(0);
session_start();
    $_SESSION['NavBar'] = [
        "title"         => "List of All Products",
        "nextPageTitle" => "Add a new product.",
        "nextPageLink"  => "new_product.php"
    ];
    require ( 'navigation.php' );
    session_unset();
    ?>
    <div class="display-portal">
    <header>
        <h1 class="page-header">
            <?= ucwords($store['storeName']);  ?>
        </h1>
        <p class="well inverted">
            <span>Owner: <?= strip_tags($store['storeOwner']) ?><br></span>
            <span>Category: <?= strip_tags($store['storeCategory']) ?><br></span>
            <span>Established Since: <?= strip_tags($store['storeEstYear']) ?><br></span>
            <span>Description: <?= strip_tags($store['storeDesc']) ?><br></span>
        </p>
    </header>
    <br>
    <?php if ( $row_count > 0 ): ?>
        <section>
            <table class='ui inverted blue celled table'>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Description</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($products as $product ): ?>
                    <tr>
                        <td><?= strip_tags($product['productName']) ?></td>
                        <td><?= strip_tags($product['productCategory']) ?></td>
                        <td><?= strip_tags($product['productPrice']) ?></td>
                        <td><?= $product['productDescription'] ?></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </section>
    <?php else: ?>
        <div class="ui inverted red celled table" style="min-height: 50px; font-size: larger">
          <span style="vertical-align: center;">There are no products listed for this store.</span>
        </div>
    <?php endif ?>
    </div>
</div>
</body>
</html>