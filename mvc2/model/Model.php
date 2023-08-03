<?php
	include_once("Customer.php");  
	  
	class Model {  

		public function searchCustomerList($uname)  
		{  
			include_once("DBConn.php");  
			$sql= "select * from customer where username LIKE '%" . $uname . "%'";
			$result=$mysqli->query($sql);

			$arr= array();

			while($row = $result->fetch_array(MYSQLI_ASSOC))	{
				
				$arr[$row['ID']]= new Customer($row['ID'], $row['username'], $row['Firstname'],$row['Lastname'], $row['email']);
			}
			
			return $arr;
		}      

		public function getEmailwithFirstnameLastname($uname, $lname)  
		{  
			include_once("DBConn.php");  
			$sql= "select * from customer where Firstname = '" . $uname . "' AND Lastname = '" . $lname . "'";
			$result=$mysqli->query($sql);

			$email = "";

			while($row = $result->fetch_array(MYSQLI_ASSOC))	{				
				$email = $row['email'];
			}
			
			return $email;
		}
		public function checkLogin($username, $password)
		{
			include_once("DBConn.php");
			$sql= "select * from customer where username = '" . $username . "' AND password = '" . $password . "'";
			$result=$mysqli->query($sql);
							
			while($row = $result->fetch_array(MYSQLI_ASSOC)){	
			
				$username = $row['username'];
				return 1;

			}
			
			 return 0;


		}
		
	}
  
		
?>