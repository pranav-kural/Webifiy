<?php

// avoiding useless warnings to be displayed out.
error_reporting(0);

// start the session
session_start();

// Extracting all the post values using extract() in a safer way.
extract($_POST);

// assign post values to session variable to be available for refill on redirect back to previous page
$_SESSION = array_merge($_POST, $_SESSION);

// create a flag variable to manage validation state
$validated = true;

// create a message variable to hold our error message
$error_msg = "";


// check if the store ID wasn't selected
if ( empty( $storeId ) ) {
    // concatenate an error message
    $error_msg .= "No store Id available.<br>";

    // set the validation state
    $validated = false;
} else {
    // sanitize the data
    $storeId = filter_var( $storeId, FILTER_SANITIZE_NUMBER_INT );
}


// check if the name was passed empty
if ( empty( $productName ) ) {
    // concatenate an error message
    $error_msg .= "The product name cannot be empty.<br>";

    // set the validation state
    $validated = false;
} else {
    // sanitize the data
    $productName = filter_var( $productName, FILTER_SANITIZE_STRING );
}

// check if the category was passed empty
if ( empty( $productCategory ) ) {
    // concatenate an error message
    $error_msg .= "The product category cannot be empty.<br>";

    // set the validation state
    $validated = false;
} else {
    // sanitize the data
    $productCategory = filter_var( $productCategory, FILTER_SANITIZE_STRING );
}

// check if the owner's name was passed empty
if ( empty( $productPrice ) ) {
    // concatenate an error message
    $error_msg .= "You missed to specify the product's price.<br>";

    // set the validation state
    $validated = false;
} else {
    // sanitize the data
    $productPrice = filter_var( $productPrice, FILTER_SANITIZE_NUMBER_INT );
}

// check if the year of establishment wasn't selected
if ( empty( $productDescription ) ) {
    // concatenate an error message
    $error_msg .= "No description was given for the product.<br>";

    // set the validation state
    $validated = false;
} else {
    // sanitize the data
    $productDescription = filter_var( $productDescription, FILTER_SANITIZE_STRING );
}

// Setting the mode for the validation
$_SESSION['mode'] = "product";

// Validating the user input
require ( 'validate.php' );

// redirecting if user input not validated successfully
if ( !empty($_SESSION['Err']) ) {
    foreach($_SESSION['Err'] as $key => $value){
        $output_key = substr($key, 0, -3);
        $output_value = $value;
        $_SESSION['fail'] .= $output_key.": ".$output_value."<br>";
    }
    header( 'Location: confirmed.php' );
    exit;
}

// connect to database
require ( 'db_connect.php' );

// build the SQL
$sql = 'INSERT INTO tblproducts (storeId, productName, productCategory, productPrice, productDescription) VALUES (:storeId, :productName, :productCategory, :productPrice, :productDescription)';

// prepare our SQL
$sth = $dbh->prepare( $sql );

// bind our values
$sth->bindParam( ':storeId', $storeId, PDO::PARAM_STR, 30 );
$sth->bindParam( ':productName', $productName, PDO::PARAM_STR, 30 );
$sth->bindParam( ':productCategory', $productCategory, PDO::PARAM_STR, 20 );
$sth->bindParam( ':productPrice', $productPrice, PDO::PARAM_INT, 4 );
$sth->bindParam( ':productDescription', $productDescription, PDO::PARAM_STR, 250 );

// execute the SQL
$sth->execute();

// close our connection
$dbh = null;

// provide confirmation
// set our session variable with the error message
$_SESSION['success'] = "You have added the product, {$productName}, successfully.";

// redirect the user and exit the script
header( 'Location: confirmed.php' );
exit;

?>