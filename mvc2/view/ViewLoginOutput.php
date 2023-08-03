<?php   
	class ViewLoginOutput
	{
		public function output($status) {
            if ($status == 1) {
                $output = "<b>You are logged in!</b>";
            }
            else {
                $output = "<b>Your username or password is invalid!</b>";
            }
            $output .= "<br/><a href ='index.php'>Go to Home</a>";
            return $output;
        }
	}
?>  
  
