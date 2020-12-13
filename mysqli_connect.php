<?php
// This file provides the information for accessing the database.and connecting to
// MySQL. It also sets the language coding to utf-8
// First we define the constants:
DEFINE ('DB_USER', 'dbu568898');
DEFINE ('DB_PASSWORD', 'VitoVito1!');
DEFINE ('DB_HOST', 'db5000316712.hosting-data.io');
DEFINE ('DB_NAME', 'dbs309050');
// Next we assign the database connection to a variable that we will call $dbcon:
$dbcon = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die ('Could not connect to MySQL: ' . mysqli_connect_error () );
// Finally, we set the language encoding.as utf-8
mysqli_set_charset($dbcon, 'utf8');

//borrowed this from previous project
//because it was already done
?>