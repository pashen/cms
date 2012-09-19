<?php

class BugController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function createAction()
    {
        // action body
    }

    public function submitAction()
    {
        $bugReportForm = new Form_BugReportForm();
        $bugReportForm->setAction('/bug/submit')
                     ->setMethod('post');
        
        if ($this->getRequest()->isPost())
        {
          if ($bugReportForm->isValid($this->getRequest()->getPost()))
          {
            // just dump the data for now
            $data = $bugReportForm->getValues();
            // process the data
            var_dump($data);
          }
        }
        $this->view->form = $bugReportForm;
    }


}





