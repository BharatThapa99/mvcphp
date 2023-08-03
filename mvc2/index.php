<html>
<head><title> MVC Webpage </title></head>
<body>

<h1>Welcome to MVC (Customer Search Example)</h1>

<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// include controller  
include_once("controller/Controller.php");  
  
//Initilize controller
$controller = new Controller();  

if(isset($_GET['uname']) && !isset($_GET['lname']) ) {
	echo "Operation 1 <br>";
	$controller->execute(2, $_GET['uname'], "");
}
else if(isset($_GET['uname']) && isset($_GET['lname']) ) {
	echo "Operation 3 <br>";
	$controller->execute(3, $_GET['uname'], $_GET['lname']);
}
else if(isset($_GET['username']) && isset($_GET['password'])) {
	echo "Operation 4 - Login <br>";
	$controller->execute(4, $_GET['username'], "", $_GET['password']);
}
else {
	// echo "Operation 2 <br>";
	$controller->execute(0, "", "");
	$controller->execute(1, "", "");
}

?>
