<?php
	class ViewSearch
	{
		public function __construct() {
			
		}

		public function output() {
			return ' <b>User Search -</b> <br> <form action="index.php">	Username : <input type="text" name="uname" placeholder="Enter username"/>  	<input type="submit" /></form>';
		}


		public function outputEmailEntry() {
			return '<b>Email Search -</b> <br>  <form action="index.php">	FirstName : <input type="text" name="uname"/> <br> LastName : <input type="text" name="lname"/>  <br>	<input type="submit" /></form>';
		}

	}
?>

