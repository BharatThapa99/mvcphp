<?php
	class ViewLogin
	{
		public function __construct() {
			
		}

		public function outputLogin() {
            return '<b>Login </b> <br>  <form action="index.php">	Username : <input type="text" name="username"/> <br><br> Password : <input type="password" name="password"/>  <br><br>	<input type="submit" /></form>';
        }


	

	}
?>

