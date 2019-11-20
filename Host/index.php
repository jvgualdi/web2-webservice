<?php

session_start();

require_once('config/autoload.php');

try
{

	if(isset($_GET['target'])){
		switch($_GET['target']){
			case 'ws': 
				include('ws/import.php');

				exit();

				break;

			default;

				break;

		}
	}
	else
	{
		$controller = !isset($_REQUEST['controller']) ? 'Publication' : $_REQUEST['controller'];

		$action = !isset($_REQUEST['action']) ? 'index' : $_REQUEST['action'];
		
		
		eval('$controller = new ' . $controller . 'Controller();');
		eval('$controller->'. $action . 'Action(false);');
		
			
		
		
	}
	
}
catch(Exception $e)
{
	error_log($e->getMessage());
}

