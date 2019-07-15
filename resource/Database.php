<?php


$dsn='mysql:host=localhost;dbname=cmpLogReg';
$user='root';
$password = "";

try {
	  $db = new PDO( $dsn , $user , $password);
	  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  
} catch (PDOException $e) {
	echo "Error " . $e->getMessage();
}



