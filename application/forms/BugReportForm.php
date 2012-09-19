<?php

class Form_BugReportForm extends Zend_Form
{

    public function init()
    {
        $author = $this->createElement('text', 'author');
	$author->setLabel('Enter your name')
	       ->setRequired(true)
	       ->setAttrib('size', 30);
        
          $this->addElement($author);
	  	   
	$email = $this->createElement('text', 'email');
	$email->setLabel('Your email address:')
	      ->setRequired(TRUE)
	      ->addValidator(new Zend_Validate_EmailAddress())
              ->addFilters(array(
                      new Zend_Filter_StringTrim(),
                      new Zend_Filter_StringToLower()
                      ))
              ->setAttrib('size', 40);
        
          $this->addElement($email);
	  		   
	$date = $this->createElement('text', 'date');
	$date->setLabel('Date the issue occured (mm-dd-yyyy):')
	     ->setRequired(TRUE)
	     ->addValidator(new Zend_Validate_Date('MM-DD-YYYY'))
	     ->setAttrib('size', 20);
        
	  $this->addElement($date);
	  
        $url = $this->createElement('text', 'url');
        $url->setLabel('Issue URL:')
            ->setRequired(TRUE)
            ->setAttrib('size', 50);
                
          $this->addElement($url);
          
        $description = $this->createElement('textarea', 'description');
        $description->setLabel('Issue description:')
                    ->setRequired(TRUE)
                    ->setAttrib('cols', 50)
                    ->setAttrib('rows', 4);
        
          $this->addElement($description);
        
        $priority = $this->createElement('select', 'priority');
        $priority->setLabel('Issue priority:')
                 ->setRequired(TRUE)
                 ->addMultiOptions(array(
                    'low' => 'Low',
                    'med' => 'Medium',
                    'high' => 'High'
                 ));
        
          $this->addElement($priority);
        
        $status = $this->createElement('select', 'status');
        $status->setLabel('Current status:')
               ->setRequired(TRUE)
               ->addMultiOption('new', 'New')
               ->addMultiOption('in_progress', 'In Progress')
               ->addMultiOption('resolved', 'Resolved');
          $this->addElement($status);
        
        $this->addElement('submit', 'submit', array('label' => 'Submit'));  
    }


}

