<?php   
	class ViewSearchOutput
	{
		public function output($customers) {
			
			$output = "<b>Search Outcome:</b> <br>";
			
			foreach ($customers as $id => $customer)  
			{  
					$output .= "Cust ID: " . $customer->id."<br/>";
					$output .= "Username: " . $customer->username."<br/>";
					$output .= "Cust Fname: " . $customer->fname . "<br/>";
					$output .= "Cust Lname: " . $customer->lname . "<br/>";
					$output .= "Cust Email: " . $customer->email . "<br/>";

					$output .= "<br/>";
			}  		
			
			$output .= "<br/><a href ='index.php'>Go to Home</a>";
			
			return $output;
		}


		public function outputEmailSearch($email) {
			
			$output = "Search Outcome: <b><i> $email </i></b> <br/> <a href ='index.php'>Go to Home</a>";			
			return $output;
		}

	}
?>  
  
