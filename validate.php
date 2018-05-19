<?php
error_reporting(0);
// Validating all the inputs made by the user and checking it for the correct format
$mode = $_SESSION['mode'];

function check20CHARS($input, $title, $message)
{
    if (strlen($input) > 20) {
        $_SESSION['Err'] = [$title => $message];
    }
}

function check250CHARS($input, $title, $message)
{
    if (strlen($input) > 250) {
        $_SESSION['Err'] = [$title => $message];
    }
}

$NoCategoryMatch = false;
function matchCategories($input, $category)
{
    if ($input == $category) {
        global $NoCategoryMatch;
        $NoCategoryMatch = true;
    }
}

function checkChars($input, $title, $message)
{
    if (!ctype_alpha($input)) {
        $_SESSION['Err'] = [$title => $message];
    }
}

function checkDesc($input, $title, $message) {
    if (!preg_match('/^[a-zA-Z0-9,]+$/', $input)) {
        $_SESSION['Err'] = [$title => $message];
    }
}

//    connecting the database
require('db_connect.php');

// checking the mode for the validations ,, mode = [ product || store ]
if ($mode == "product") :

    // Validating the storeId selected
    // build the SQL statement with placeholders
    $sql = 'SELECT storeId FROM tblstores';
    $stores = $dbh->query($sql);
    $row_count = $stores->rowCount();
    if ($row_count > 0) {
        foreach ($stores as $store) {
            if ($store['id'] != $storeId) {
                $_SESSION['Err'] = ["StoreIdErr" => "Store selected is not found"];
            }
        }
    } else {
        $_SESSION['Err'] = ["StoreIdErr" => "No stores found. Please, add a store first."];
    }

    checkChars($productName, "ProductNameErr", "Product name is not valid. Can contain only alphabets");
    check20CHARS($productName, "ProductNameErr", "Product name is too long. It should be less than 20 characters");

    if (is_numeric($productPrice)) {
        $_SESSION['Err'] = ["ProductPriceErr" => "Product Price should a number."];
    }

    checkDesc($productDescription, "ProductDescriptionErr", "Product description is not valid. Can contain only alphabets");
    check250CHARS($productDescription, "ProductDescriptionErr", "Product description is too long. It should be less than 250 characters");

    $ProductCategories = array("Sale", "Employee stocks", "Inventory", "Other");
    $ProductCategoryInput = array_fill(0, count($ProductCategories), $productCategory);
    array_map("matchCategories", $ProductCategoryInput, $ProductCategories);
    if (!$NoCategoryMatch) {
        $_SESSION['Err'] = ["ProductCategoryErr" => "Invalid Category selected for the product"];
    }

endif;

if ($mode == "store") :

    $userInput = array(
        $storeName, $storeOwner, $storeCategory
    );

    $inputTitle = array(
        "StoreNameErr", "StoreOwnerErr", "StoreCategoryErr"
    );

    $ErrMsg = array(
        "Store name is too long. It should be less than 20 characters",
        "Store owner's name is too long. It should be less than 20 characters",
        "Store category isn't valid."
    );

    array_map("check20CHARS", $userInput, $inputTitle, $ErrMsg);

    if (!is_numeric($storeEstYear)) {
        $_SESSION['Err'] = ["StoreEstYearErr" => "Store Established year not valid."];
    }

    checkDesc($storeDesc, "StoreDescriptionErr", "Store description is not valid. Can contain only alphabets");
    check250CHARS($storeDesc, "StoreDescription", "Store description is too long. It should be less than 250 characters");

    $StoreCategories = array("Automotive", "Business Services", "Medical Services", "Software Development", "Retail", "Wholesale", "Logistics", "Other");
    $StoreCategoryInput = array_fill(0, count($StoreCategories), $storeCategory);
    array_map("matchCategories", $StoreCategoryInput, $StoreCategories);
    if ($NoCategoryMatch) {
        $_SESSION['Err'] = ["StoreCategoryErr" => "Invalid Category selected for the Store"];
    }

endif;

