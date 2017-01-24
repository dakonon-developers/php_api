<?php

require 'user/UserController.php';

class Api {

	private $method;
	

    function __construct($method) {
		$this->method = $method;
    }
	
	public function get_app($params)
	{
		switch($params[0])
		{
			case 'user':
				$user = new UserController();
				if (count($params)>1)
				{
					$user->useMethod($params[1],$this->method);
				}
				break;
			
			/*case 'POST':
				break;
				
			case 'PUT':
				break;
				
			case 'DELETE':
				break;
			
			default:
				// nada*/
		}
	}
	
}

?>