
<?php 
/*
    * Information of database
*/
/**
    * variable string name of database
*/
$dbName = "dataphi";

/**
    * variable string host name
*/
$host = "localhost";

/**
* variable string username
*/
$username = "root";

/**
* variable string password of database
*/
$password = "";

/**
* variable integer maximum rows to be fetched from database
*/
$maxRows = 10;

/*
    * optional array for configuration of connection to database
*/
$opt = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );  
?>
