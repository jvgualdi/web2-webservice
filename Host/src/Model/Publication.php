<?php

class Publication
{
  private $id;
  private $title;
  private $time;
  private $path;
  
  public function __construct() { }
  
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function getPath()
  {
    return $this->path;
  }
  public function setPath($path)
  {
    $this->path = $path;
  }
  public function getTime()
  {
    return $this->time;
  }
  public function setTime($time)
  {
    $this->time = $time;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
}