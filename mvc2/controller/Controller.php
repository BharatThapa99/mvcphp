<?php

include_once("model/Model.php");  
include_once("view/ViewSearch.php");  
include_once("view/ViewSearchOutput.php");  
include_once("view/ViewLogin.php");
include_once("view/ViewLoginOutput.php");
  
class Controller {  

    public $model;   
  
    public function __construct()        {    
        $this->model = new Model();  
    }   
      
	public function execute($action, $uname, $lname, $password="")  	{  
	
		if($action == 0) {
			$v = new ViewLogin();
			echo $v->outputLogin();
			$v = new ViewSearch(); 
			echo $v->output();
		}
		else if($action == 1) {

			$v = new ViewSearch(); 
			echo $v->outputEmailEntry();
			

		} else if($action == 2) {

			$v = new ViewSearch(); 
			echo $v->output();

			$customers = $this->model->searchCustomerList($uname);
			$v = new ViewSearchOutput(); 
			echo $v->output($customers);

		} else if($action == 3) {

			$v = new ViewSearch(); 
			echo $v->outputEmailEntry();

			$emailOutput = $this->model->getEmailwithFirstnameLastname($uname, $lname);
			$v = new ViewSearchOutput(); 
			echo $v->outputEmailSearch($emailOutput);
		} else if($action == 4) {

			$loginOutput = $this->model->checkLogin($uname, $password);
			$v = new ViewLoginOutput();
			echo $v->output($loginOutput);

		}


	}  

}  

?>