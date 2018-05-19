<?php

error_reporting(0);
// connect to database
require ( 'db_connect.php' );

// build the SQL statement
$sql = 'SELECT * FROM tblstores';

// prepare, execute, and fetchAll
$stores = $dbh->query( $sql );

// count the rows
$row_count = $stores->rowCount();

// close the DB connection
$dbh = null;

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Webifiy - Add a new Store</title>
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
    <title>All Stores</title>
</head>
<body>


<div class='container'>
<?php
session_start();
    $_SESSION['NavBar'] = [
        "title"         => "List of All Stores",
        "nextPageTitle" => "Add a new awesome store.",
        "nextPageLink"  => "new_store.php"
    ];
    require ( 'navigation.php' );
    session_unset();
    ?>
    <div class="display-portal">
    <section>
        <?php if ( $row_count > 0 ): ?>
            <table class='ui inverted blue celled table'>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Owner</th>
                    <th>Category</th>
                    <th>Established since</th>
                    <th>NPO</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($stores as $store ): ?>
                    <tr>
                        <td><div class="ui ribbon label"><h4><a href="stores_product.php?id=<?= $store['storeId'] ?>"><?= ucwords(strip_tags($store['storeName'])); ?></a></h4></div></td>
                        <td><?= strip_tags($store['storeOwner']) ?></td>
                        <td><?= strip_tags($store['storeCategory']) ?></td>
                        <td><?= strip_tags($store['storeEstYear']) ?></td>
                        <td><?= strip_tags($store['storeNPO']) ?></td>
                        <td><?= strip_tags($store['storeDesc']) ?></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-warning">
                No store information to display.
            </div>
        <?php endif ?>
    </section>
</div>
    </div>
</body>
</html>
