<?php

class PublicationController extends Controller
{
  private $publicationDao;

  public function __construct()
  {
    $this->view = new PublicationView();
    $this->publicationDao = new PublicationDao();
  }
  
  public function indexAction(){

    $publicationDao = new PublicationDao();

    $this->feedAction($publicationDao->getAll());
  }

  public function feedAction($publications){

    $viewModel = array(
      'publications' => $publications,
    );  

    $this->setRoute($this->view->getIndexRoute());
    $this->showView($viewModel);
    
  }

  public function createAction()
  { 
    $message = Message::singleton();
    
    $viewModel = array();
    
    if(array_key_exists ('save', $_POST))
    {
      
      $title =  array_key_exists ('title', $_POST) ? $_POST['title'] : '';
      
      $meme =  array_key_exists ('meme', $_POST) ? $_POST['meme'] : '';
      
      try
      {
        if(empty($title))
          throw new Exception('Dê um título ao seu meme');

        if(empty($_FILES))
          throw new Exception('Selecione uma imagem para enviar');

        if(($_FILES['meme']['type'] != 'image/jpeg') && ($_FILES['meme']['type'] != 'image/png'))
          throw new Exception('Formato não suportado! Envie apenas imagens JPEG ou PNG');
        
        if ($_FILES["meme"]["size"] > 3000000) 
          throw new Exception('Imagem muito grande! Tamanho máximo: 3MB');
        
        # Pega hora atual
        $now = new DateTime();
        
        $basePath = 'media/';
        $path = $basePath . $now->format('YmdHis') . $_FILES['meme']['name']; 

        $uploadfile = $basePath . $now->format('YmdHis') . basename($_FILES['meme']['name']);

        if (move_uploaded_file($_FILES['meme']['tmp_name'], $uploadfile)){
          //Tudo certo

        }
        else
          throw new Exception("Falha ao enviar imagem");
          


        $publication = new Publication();
        $publication->setPath($path);
        $publication->setTime($now->format('Y-m-d H:i:s'));
        $publication->setTitle($title);

        $publicationDao = new PublicationDao(); 
      
        if($publicationDao->insert($publication))
          $message->addMessage('Sua publicação foi enviada');
        else
          throw new Exception('Problema ao publicar');
        
        $this->indexAction();
        return;
      }
      catch(Exception $e)
      {
        $this->setRoute($this->view->getCreateRoute()); 
        
        $message->addWarning($e->getMessage());
      }
    }
    else
      $this->setRoute($this->view->getCreateRoute()); 

    $this->showView($viewModel);

    return;
  }

  public function updateAction()
  { 
    $message = Message::singleton();
    
    $viewModel = array();

    $id = isset($_GET['id']) ? $_GET['id'] : '';
    
    if(array_key_exists ('save', $_POST))
    {
      
      $title =  array_key_exists ('title', $_POST) ? $_POST['title'] : '';
      
      try
      {
        
        if(empty($title))
          throw new Exception('Dê um título ao seu meme');
  
        $publication = new Publication();
        $publication->setId($id);
        $publication->setTitle($title);

        $publicationDao = new PublicationDao(); 
      
        if($publicationDao->update($publication))
          $message->addMessage('Sua publicação foi alterada');
        else
          throw new Exception('Problema ao alterar');
        
        $this->indexAction();
        return;
      }
      catch(Exception $e)
      {
        $this->setRoute($this->view->getCreateRoute()); 
        
        $message->addWarning($e->getMessage());
      }
    }
    else{
      $this->setRoute($this->view->getUpdateRoute()); 
      $viewModel = array(
        'publication' => $this->publicationDao->getById($id)
      );
    }

    $this->showView($viewModel);

    return;
  }

  public function deleteAction()
  { 
    $message = Message::singleton();
    
    $viewModel = array();

    $id = isset($_GET['id']) ? $_GET['id'] : '';
    
    if(array_key_exists ('save', $_POST))
    {

      try
      {
        
        $publicationDao = new PublicationDao(); 
      
        if($publicationDao->delete($id))
          $message->addMessage('Sua publicação foi removida');
        else
          throw new Exception('Problema ao remover');
        
        $this->indexAction();
        return;
      }
      catch(Exception $e)
      {
        $this->setRoute($this->view->getDeleteRoute()); 
        
        $message->addWarning($e->getMessage());
      }
    }
    else{
      $this->setRoute($this->view->getDeleteRoute()); 
      $viewModel = array(
        'publication' => $this->publicationDao->getById($id)
      );
    }

    $this->showView($viewModel);

    return;
  }

}