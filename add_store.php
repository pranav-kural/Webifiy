<?php

error_reporting(0);
// start the session
session_start();

// Extracting all the post values using extract() in a safer way.
extract($_POST);

// Set the POST values to the session variables with corresponding names
$_SESSION = array_merge($_POST, $_SESSION);

// create a flag variable to manage validation state
$validated = true;

// create a message variable to hold our error message
$error_msg = "";

// check if the name was passed empty
if ( empty( $storeName ) ) {
    // concatenate an error message
    $error_msg .= "The store name cannot be empty.<br>";

    // set the validation state
    $validated = false;
} else {
    // sanitize the data
    $storeName = filter_var( $storeName, FILTER_SANITIZE_STRING );
}

// check if the category was passed empty
if ( empty( $storeCategory ) ) {
    // concatenate an error message
    $error_msg .= "The store category cannot be empty.<br>";

    // set the validation state
    $validated = false;
} else {
    // sanitize the data
    $storeCategory = filter_var( $storeCategory, FILTER_SANITIZE_STRING );
}

// check if the owner's name was passed empty
if ( empty( $storeOwner ) ) {
    // concatenate an error message
    $error_msg .= "You missed to specify the owner's name.<br>";

    // set the validation state
    $validated = false;
} else {
    // sanitize the data
    $storeOwner = filter_var( $storeOwner, FILTER_SANITIZE_STRING );
}

// check if the year of establishment wasn't selected
if ( empty( $storeEstYear ) ) {
    // concatenate an error message
    $error_msg .= "The store's year of established wasn't selected.<br>";

    // set the validation state
    $validated = false;
} else {
    // sanitize the data
    $storeEstYear = filter_var( $storeEstYear, FILTER_SANITIZE_NUMBER_INT );
}

// check if the NPO check wasn't selected
if ( empty( $storeNPO ) ) {
    // concatenate an error message
    $error_msg .= "You didn't told if the store is a <abbr title='Not-for-Profit Organization'>NPO</abbr><br>";

    // set the validation state
    $validated = false;
} else {
    // sanitize the data
    $storeNPO = filter_var( $storeNPO, FILTER_SANITIZE_STRING );
}

// check if the NPO check wasn't selected
if ( empty( $storeDescription ) ) {
    // concatenate an error message
    $error_msg .= "No store description given.";

    // set the validation state
    $validated = false;
} else {
    // sanitize the data
    $storeDescription = filter_var( $storeDescription, FILTER_SANITIZE_STRING );
}

// Setting the mode for the validation
$_SESSION['mode'] = "store";

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
$sql = 'INSERT INTO tblstores (storeName, storeOwner, storeCategory, storeEstYear, storeNPO, storeDesc) VALUES (:storeName, :storeOwner, :storeCategory, :storeEstYear, :storeNPO, :storeDesc)';

// prepare our SQL
$sth = $dbh->prepare( $sql );

// bind our values
$sth->bindParam( ':storeName', $storeName, PDO::PARAM_STR, 20 );
$sth->bindParam( ':storeOwner', $storeOwner, PDO::PARAM_STR, 20 );
$sth->bindParam( ':storeCategory', $storeCategory, PDO::PARAM_STR, 20 );
$sth->bindParam( ':storeEstYear', $storeEstYear, PDO::PARAM_INT, 4 );
$sth->bindParam( ':storeNPO', $storeNPO, PDO::PARAM_STR, 2 );
$sth->bindParam( ':storeDesc', $storeDesc, PDO::PARAM_STR, 250 );

// execute the SQL
$sth->execute();

// close our connection
$dbh = null;

// provide confirmation
// set our session variable with the error message
$_SESSION['success'] = "You have added the new store, {$storeName}, successfully.";
// redirect the user and exit the script
header( 'Location: confirmed.php' );
//echo $_SESSION['success'];
exit;
?>


