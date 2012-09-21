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
            //$data = $bugReportForm->getValues();
            $bugModel = new Model_Bug();
            // if model is valid then create a new bug
            $result = $bugModel->createBug(
                    $bugReportForm->getValue('author'),
                    $bugReportForm->getValue('email'),
                    $bugReportForm->getValue('date'),
                    $bugReportForm->getValue('url'),
                    $bugReportForm->getValue('description'),
                    $bugReportForm->getValue('priority'),
                    $bugReportForm->getValue('status')
                    );
           // if the bug method returns a result
           // then the bug was successfully created
            if ($result)
            {
              $this->_forward('confirm');
            }
          }
        }
        $this->view->form = $bugReportForm;
    }

    public function confirmAction()
    {
        // action body
    }

    public function listAction()
    {
        // action body
      $bugModel = new Model_Bug();
      $this->view->bugs = $bugModel->fetchBugs();
       // get the filter form
      $listToolsForm = new Form_BugReportListToolsForm();
      $listToolsForm->setAction('/bug/list')
                    ->setMethod('post');
        $this->view->listToolsForm = $listToolsForm;
    }


}