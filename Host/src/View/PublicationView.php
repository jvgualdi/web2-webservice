<?php

class PublicationView
{
	public function __construct(){}
	
	public function getIndexRoute()
	{
		return 'publication/index.php';
	}
	public function getCreateRoute()
	{
		return 'publication/create.php';
	}
	public function getUpdateRoute()
	{
		return 'publication/update.php';
	}
	public function getDeleteRoute()
	{
		return 'publication/delete.php';
	}
	
}