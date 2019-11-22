<?php

class PublicationController extends Controller
{
  public function __construct()
  {
    $this->view = new PublicationView();
  }

  public function indexAction(){
    $this->feedAction($publicationDao->getAll());

  }

  public function feedAction($publications)
  {
    $viewModel = array(
      'publications' => $publications,
    );

    $this->setRoute($this->view->getIndexRoute());
    $this->showView($viewModel);
  }

}
