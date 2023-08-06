<?php

require_once 'model/Model.php';
require_once 'view/View.php';

class Controller {
    public function execute() {
        if (isset($_GET['email']) && isset($_GET['subject']) && isset($_GET['message'])) {
            $email = $_GET['email'];
            $subject = $_GET['subject'];
            $message = $_GET['message'];

            $emailModel = new EmailModel();
            $result = $emailModel->sendEmail($email, $subject, $message);

            $last_line = $result['last_line'];
            $retval = $result['retval'];

            
            $v = new ViewEmailForm();
            echo $v-> emailOutput($last_line, $retval);
        } else {
            $v = new ViewEmailForm();
            echo $v-> output();
        }
    }
}
