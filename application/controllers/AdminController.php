<?php

class AdminController extends Zend_Controller_Action
{

public function init()
{
    if ( !Zend_Auth::getInstance()->hasIdentity() ) {
       return $this->_helper->redirector->goToRoute( array('controller' => 'auth'), null, true);
    }

}

public function indexAction()
{
	

        $usuario = Zend_Auth::getInstance()->getIdentity();
        $this->view->usuario = $usuario;
       


}

}


