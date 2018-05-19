<?php

// connecting to the database on the localhost
$host = 'sql.computerstudi.es';
$dbname = 'gc200333253';
$username = 'gc200333253';
$password = '3C^TL5rT';

try {
// connect to the DB
    $dbh = new PDO( "mysql:host={$host};dbname={$dbname}", $username, $password );
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} catch (Exception $_e) {
    echo "Could not connect to database. Caught Exception: $_e->getMessage() ";
}