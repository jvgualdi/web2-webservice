<?php

session_start();

require_once('config/autoload.php');

try
{

	
	$controller = !isset($_REQUEST['controller']) ? 'Webservice' : $_REQUEST['controller'];

	$action = !isset($_REQUEST['action']) ? 'loadFeed' : $_REQUEST['action'];
	
	
	eval('$controller = new ' . $controller . 'Controller();');
	eval('$controller->'. $action . 'Action(false);');
		
	
}
catch(Exception $e)
{
	error_log($e->getMessage());
}

