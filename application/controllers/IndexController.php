<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        if ( !Zend_Auth::getInstance()->hasIdentity() ) {
        return $this->_helper->redirector->goToRoute( array('controller' => 'auth'), null, true);
    }

        


    }

    public function indexAction()
    {
        // action body

        //$db = Zend_Db_Table::getDefaultAdapter();

        //$row = $db->fetchAll('select * from tbl_usuario');
        //var_dump($row);

        //$usuario = new Application_Model_Usuario();

        //$rows= $usuario->listar();
        //var_dump($rows);
        //return $this->_helper->redirector('login');
        //return $this->_helper->redirector->goToRoute( array('controller' => 'auth','action' => 'login'),  null, true);

        $usuario = Zend_Auth::getInstance()->getIdentity();
        $this->view->usuario = $usuario;
    }

    public function semacessoAction(){
        
        

    }

    


   

}

