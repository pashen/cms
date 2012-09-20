<?php

class Model_Bug extends Zend_DB_Table_Abstract
{
    protected $_name = 'bugs';

    public function createBug( $name, $email, $date, $url, $description, $priority, $status)
    {
      // create a new row in the bugs table

      $row = $this->createRow();

      $row->author = $name;
      $row->email = $email;
      $dateObject = new Zend_Date($date);
      $row->date = $dateObject->get(Zend_Date::TIMESTAMP);
      $row->url = $url;
      $row->description = $description;
      $row->priority = $priority;
      $row->status = $status;

      // save the row object
      $row->save();
      $id = $this->_db->lastInsertId();
      return $id;
    }
    
    public function fetchBugs()
    {
      $select = $this->select();
      return $this->fetchAll($select);
    }
  
}

