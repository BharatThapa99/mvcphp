<?php

class Customer {  
    public $id;  
    public $username;
    public $fname;  
    public $lname;  
    public $email;  
      
    public function __construct($id, $username, $fname, $lname, $email)    
    {    
        $this->id = $id;  
        $this->username = $username;
        $this->fname = $fname;  
        $this->lname = $lname;  
        $this->email = $email;  
    }   
}  

?>