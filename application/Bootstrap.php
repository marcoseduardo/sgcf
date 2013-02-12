<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{


	protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');

        	//seta o title padrao
        $view->headTitle('Sistema de Gestão para Clinica de Fisioteradia')
             ->setSeparator(' | ');

              // Set the initial stylesheet:
       // $view->headLink()->prependStylesheet('/css/style..css');

          // Set the initial JS to load:
      //  $view->headScript()->prependFile('/js/site.js');

    }
    protected function _initAutoload()
{
    $autoloader = new Zend_Application_Module_Autoloader(array(
            'basePath' => APPLICATION_PATH,
            'namespace' => ''
    ));
        $usuario = Zend_Auth::getInstance()->getIdentity();
        $this->view->usuario = $usuario;
    return $autoloader;
    
}
protected function _initPlugins()
    {
        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->registerNamespace('My_');
 
        $objFront = Zend_Controller_Front::getInstance();
        $objFront->registerPlugin(new My_Controller_Plugin_ACL(), 1);
        return $objFront;
    }




}

?>