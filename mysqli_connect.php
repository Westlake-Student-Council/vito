<?php
// This file provides the information for accessing the database.and connecting to
// MySQL. It also sets the language coding to utf-8
// First we define the constants:
DEFINE ('DB_USER', '****');
DEFINE ('DB_PASSWORD', '****');
DEFINE ('DB_HOST', '****');
DEFINE ('DB_NAME', '****');
// Next we assign the database connection to a variable that we will call $dbcon:
$dbcon = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die ('Could not connect to MySQL: ' . mysqli_connect_error () );
// Finally, we set the language encoding.as utf-8
mysqli_set_charset($dbcon, 'utf8');

//borrowed this from previous project
//because it was already done
?>
