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
    
//    public function fetchBugs($filters = array(), $sortfield = null, $limit = null)
//    {
//      $select = $this->select();
//      // add any filters which are set
//      if (count($filters) > 0)
//      {
//        foreach ($filters as $field => $filter)
//        {
//          $select->where($field . ' = ? ', $filter);
//        }
//      }
//      // add the sort field is it is set
//      if (null != $sortfield) 
//      {
//        $select->order($sortfield);
//      }
//      return $this->fetchAll($select);
//    }
    
    public function fetchPaginatorAdapter($filters = array(), $sortfield = null)
    {
      $select = $this->select();
      // add any filters wich are set
      if (count($filters) > 0)
      {
        foreach ($filters as $field => $filter)
        {
          $select->where($field . ' = ? ', $filter);
        }
      }
      // add the sort field is it is set
      if (null != $sortfield)
      {
        $select->order($sortfield);
      }
      // creates new of the paginator adapter and return it
      $adapter = new Zend_Paginator_Adapter_DbTableSelect($select);
      return $adapter;
    }
    
}

