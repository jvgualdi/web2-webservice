<?php
class Controller
{
	private $model;

	private $view = false;
	
	private $route;

	public function __contruct(){}
	
	public function showView($viewModel = false)
	{
		

		if($viewModel)
			foreach ($viewModel as $key => $value)
				eval('$'.$key. ' = $viewModel["$key"];');
		
		include('view/default/header.php');

		include("view/helper/message.php");
		
		include("view/".$this->getRoute());
		
		include('view/default/footer.php');
		
	}
	public function getView()
	{
		return $this->view;
	}

	public function setRoute($route)
	{
		$this->route = $route; 
	}
	public function getRoute()
	{
		return $this->route;
	}
}