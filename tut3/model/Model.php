<?php
class EmailModel {
    public function sendEmail($email, $subject, $message) {
        // echo '<pre>';
        $stri = "wsl echo ".$message." | wsl mail -s ". $subject. " ".$email;

        $last_line = system($stri, $retval);
        // echo '</pre> <hr />Last line of the output: ' . $last_line . ' <hr 
        // />Return value: ' . $retval;
        return [
            'last_line' => $last_line,
            'retval' => $retval
        ];
    }
}

?>