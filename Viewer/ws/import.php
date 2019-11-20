<?php

try{

	$token = array_key_exists('token', $_POST) ? $_POST['token'] : false;

	/*if(!$token)
		throw new Exception('Acesso negado: Token inválido.');

	if($token != '202cb962ac59075b964b07152d234b70')
		throw new Exception('Token inválido.');		*/

	$publicationDao = new PublicationDao();

	$publications = $publicationDao->getAll();

	foreach ($publications as $publication)
	{
		$return[$publication->getId()]['id'] = $publication->getId();

		$return[$publication->getId()]['path'] = $_SERVER['HTTP_HOST'] . '/' . $publication->getPath();

		$return[$publication->getId()]['title'] = $publication->getTitle();

		$return[$publication->getId()]['time'] = $publication->getTime();

	}

	echo json_encode($return);
}catch(Exception $e)
{
	error_log($e->getMessage());
}
