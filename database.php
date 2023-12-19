<?php
$servername = "localhost";
$username = "id21690280_root";
$password = "Aasu@1902";
$dbname = "id21690280_root";
	try {
	  	$conn = new PDO("mysql:host=localhost;port=3306;dbname=id21690280_root;", $username, $password);
	  	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
	  echo $e->getMessage();exit();
	}
?>
