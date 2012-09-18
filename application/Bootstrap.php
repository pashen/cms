<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
  // Iniialize view
  function _initView()
  {
    $view = new Zend_View();
    $view->doctype('XHTML1_STRICT');
    $view->headTitle('Zend CMS');
    $view->skin = 'blues';
    
    // Add it to the ViewRenderer
    $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer');
    $viewRenderer->setView($view);
    // Return it so it can be stored by the bootstrap
    return $view;
  }
}

