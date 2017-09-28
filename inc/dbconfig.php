<?php

define('DB_SERVER', '84.19.166.104');
define('DB_USERNAME', 'c1dbu1');
define('DB_PASSWORD', 'AMsiF5EB3M');
define('DB_DATABASE', 'c1db14');
define("BASE_URL", "http://localhost/photo/"); // Eg. http://yourwebsite.com


function getDB() 
{
$dbhost=DB_SERVER;
$dbuser=DB_USERNAME;
$dbpass=DB_PASSWORD;
$dbname=DB_DATABASE;
try {
$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass); 
$dbConnection->exec("set names utf8");
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $dbConnection;
}
catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
}
}
$db = getDB();
	
