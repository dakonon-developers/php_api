<?php
require_once 'User.php';


class UserController {

    function __construct() {
	}
	
	public function useMethod($name,$method)
	{
		switch($name)
		{
			case 'login':
				$this->login($method);
				break;
					
			case 'create':
				$this->create($method);
				break;
			default:
				//none
		}
	}
	
	private function create($method)
	{
		$valid = $this->valid($method,$method == 'POST' ? True:False);
		if($valid=='')
		{
			$params = json_decode(file_get_contents('php://input'), true);
			$user = new User($params);
			echo $user->create();

		}
		else
		{
			echo $valid;
		}
	}

	private function login($method){
		$valid = $this->valid($method,$method == 'POST' ? True:False);
		if($valid=='')
		{
			$params = json_decode(file_get_contents('php://input'), true);
			$user = new User();
			echo $user->login($params);

		}
		else
		{
			echo $valid;
		}
	}
	
	private function valid($method_name,$condition)
	{
		if(!$condition)
		{
			return "Method ".$method_name." not allowed";
		}
		return '';
	}
}


