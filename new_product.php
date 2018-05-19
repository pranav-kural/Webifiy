<?php

error_reporting(0);

// connect to database
require ( 'db_connect.php' );

// build the SQL statement with placeholders
$sql = 'SELECT storeId, storeName FROM tblstores';

// prepare, execute, and fetch our result set using the query,, all at once :)
$stores = $dbh->query( $sql );

// count the rows returned
$row_count = $stores->rowCount();

// close the DB connection
$dbh = null;

?>

<!-- Add a new Product -->
<!DOCTYPE html>

<html lang="en" class=" js cssanimations csscalc cssvhunit">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Webifiy - Add a new product</title>
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
session_start();
    $_SESSION['NavBar'] = [
        "title"         => "Add a new Product",
        "nextPageTitle" => "Add a new awesome store.",
        "nextPageLink"  => "new_store.php"
    ];
    require ( 'navigation.php' );
    session_unset();
    ?>
        <?php if ($row_count > 0 ): ?>
        <form id="addStoreForm" name="addStoreForm" class="fs-form fs-form-full" action="add_product.php" method="post">
            <ol class="fs-fields">

                <li class="fs-current">
                    <label class="fs-field-label fs-anim-upper" for="storeId"
                           data-info="Select the category your store belongs to.">Select the Store name:</label><br>
                    <select class="fs-anim-lower" id="storeId" name="storeId" required="">
                        <option value="" disabled selected>Select a Store</option>
                        <?php foreach ( $stores as $store ): ?>
                            <option value="<?= htmlspecialchars($store['storeId']) ?>"><?= strip_tags($store['storeName']) ?></option>
                        <?php endforeach ?>
                    </select>
                </li>

                <li>
                    <label class="fs-field-label fs-anim-upper" for="productName">Name of the Product?</label>
                    <input class="fs-anim-lower" id="productName" name="productName" type="text" placeholder="Product's Name"
                           required="">
                </li>

                <li>
                    <label class="fs-field-label fs-anim-upper" for="productCategory"
                           data-info="Select the category your store belongs to.">What category does it belong
                        to?</label>
                    <select class="fs-anim-lower" id="productCategory" name="productCategory" required="">
                        <option value="" disabled selected>Select a Category</option>
                        <option value="Sale">Sale</option>
                        <option value="Employee stocks">Employee stocks</option>
                        <option value="Inventory">Inventory</option>
                        <option value="Other">Other</option>
                    </select>
                </li>

                <li>
                    <label class="fs-field-label fs-anim-upper" for="productPrice">Price of the Product?</label>
                    <input class="fs-anim-lower" id="productPrice" name="productPrice" type="number" placeholder="Product's Price"
                           required="">
                </li>

                <li>
                    <label class="fs-field-label fs-anim-upper" for="productDescription">Describe your awesome product here:</label>
                    <textarea class="fs-anim-lower" id="productDescription" name="productDescription" placeholder="Describe here" required></textarea>
                </li>
            </ol><!-- /fs-fields -->
            <button class="fs-submit" type="submit">Add the product to your fantabulous Webifiy Store</button>
        </form><!-- /fs-form -->
        <?php else: ?>
            <div class="alert alert-warning">
                You must add a store first.
            </div>
        <?php endif ?>
        <span class="fs-message-error"></span>
        
    </div><!-- /fs-form-wrap -->
    


</div><!-- /container -->
<script src="js/classie.js"></script>
<script src="js/selectFx.js"></script>
<script src="js/fullscreenForm.js"></script>
<script>
    (function () {
        var formWrap = document.getElementById('fs-form-wrap');

        [].slice.call(document.querySelectorAll('select.cs-select')).forEach(function (el) {
            new SelectFx(el, {
                stickyPlaceholder: false,
                onChange: function (val) {
                    document.querySelector('span.cs-placeholder').style.backgroundColor = val;
                }
            });
        });

        new FForm(formWrap, {
            onReview: function () {
                classie.add(document.body, 'overview'); // for demo purposes only
            }
        });
    })();
</script>


</body>
</html>
