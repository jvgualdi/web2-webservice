<?php

class PublicationDao
{
  const _table = '_publication';

  public function __construct() { }

  public function insert($publication)
  {
    $db = Database::singleton();

    $sql = 'INSERT INTO '. self::_table .' (title, path, time) VALUES (?,?,?)';
    
    $sth = $db->prepare($sql);

    $sth->bindValue(1, trim ($publication->getTitle()), PDO::PARAM_STR);
    $sth->bindValue(2, trim ($publication->getPath()), PDO::PARAM_STR);
    $sth->bindValue(3, trim ($publication->getTime()), PDO::PARAM_STR);
  
    return $sth->execute();
  }

  public function update($publication)
  {
    $db = Database::singleton();

    $sql = 'UPDATE ' . self::_table . ' SET title = ? WHERE id = ?';
    
    $sth = $db->prepare($sql);

    $sth->bindValue(1, $publication->getTitle(), PDO::PARAM_STR);
    $sth->bindValue(2, $publication->getId(), PDO::PARAM_INT);
    
    return $sth->execute();
  }

  public function delete($id)
  {  
    $db = Database::singleton();

    $sql = 'DELETE FROM ' . self::_table . ' WHERE id = ?';
    
    $sth = $db->prepare($sql);

    $sth->bindValue(1, $id, PDO::PARAM_INT);
    
    return $sth->execute();    

  }

  public function getAll()
  {

    $db = Database::singleton();

    $sql = 'SELECT * FROM ' . self::_table . ' ORDER BY id DESC';
    
    $sth = $db->prepare($sql);

    $sth->execute();

    $publications = array();
    
    while($obj = $sth->fetch(PDO::FETCH_OBJ))
    {
      $publication = new Publication();
      $publication->setId($obj->id);
      $publication->setTitle($obj->title);
      $publication->setTime($obj->time);
      $publication->setPath($obj->path);

      $publications[] = $publication; 
    }
    
    return $publications;  
  }

  public function getById($id)
  {

    $db = Database::singleton();

    $sql = 'SELECT * FROM ' . self::_table . ' WHERE id = ' . $id;
    
    $sth = $db->prepare($sql);

    $sth->execute();

    if($obj = $sth->fetch(PDO::FETCH_OBJ))
    {
      $publication = new Publication();
      $publication->setId($obj->id);
      $publication->setTitle($obj->title);
      $publication->setTime($obj->time);
      $publication->setPath($obj->path);

      return $publication; 
    }
    
    return false;  
  }

}