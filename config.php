<?php 
// DB credentials.
define('DB_HOST','localhost'); // Define the database host.
define('DB_USER','root'); // Define the database username.
define('DB_PASS',''); // Define the database password.
define('DB_NAME','carrentalsystem'); // Define the name of the database.

// Establish database connection.
try
{
    // Create a new PDO (PHP Data Objects) instance to connect to the database.
    $dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
    // If an exception (error) occurs during the connection attempt, print an error message and exit the script.
    exit("Error: " . $e->getMessage());
}
?>
