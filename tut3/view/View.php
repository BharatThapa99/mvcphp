<?php
	class ViewEmailForm
	{
		public function __construct() {
			
		}

		public function output() {
			return ' <h2>Send mail: </h2>
                <form action="index.php" method="get">	
                Email Address : <input type="text" name="email" required/> 
                <br><br> Subject : <input type="text" name="subject" required/>
                <br><br> Message : <textarea name="message" required/></textarea>
                <br><br><input type="submit" /></form>';
		}
        public function emailOutput($last_line, $retval) {
            return '<hr />Last line of the output: ' . $last_line . ' <hr />Return value: ' . $retval;
        }

	}
?>
