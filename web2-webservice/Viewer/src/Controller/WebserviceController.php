<?php

class WebserviceController extends Controller
{
	
  public function __construct() {}

  public function loadFeedAction()
  {
	require_once('common-class/host.php');
	
	$url = $server . '/web2-webservice/Host/index.php?target=ws';

    $data = array('token' => '202cb962ac59075b964b07152d234b70');

    $data = http_build_query($data);

    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    CURL_SETOPT($curl, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($curl, CURLOPT_POST, true);

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

    $json = curl_exec($curl);

    curl_close($curl);


    $json = json_decode($json, true);

    if(is_null($json))
      $publications = '';

    else
    {

      $publications = array();
      foreach ($json as $publication)
      {
        $newPub = new Publication();

        $newPub->setId($publication['id']);
        $newPub->setTitle($publication['title']);
        $newPub->setTime($publication['time']);
        $newPub->setPath($publication['path']);

        $publications[] = $newPub;

      }
    }

    $controller = new PublicationController();
    $controller->feedAction($publications);
    return;
  }

}
