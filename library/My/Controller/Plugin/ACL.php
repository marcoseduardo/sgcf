<?php
// library/My/Controller/Plugin/ACL.php
class My_Controller_Plugin_ACL extends Zend_Controller_Plugin_Abstract
{
    protected $_defaultRole = 'guest';
 
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        //pega o auth
        $auth = Zend_Auth::getInstance();

        $acl = new My_Acl();

        $mysession = new Zend_Session_Namespace('mysession');
 

        //verifica se o usuario está logado, senao, ele redireciona para o login
        if($auth->hasIdentity()) {
            //pega o usuario autenticado no sistema
            $user = $auth->getIdentity();
            //verifica se o usuario tem permissao de acesso, se o usuario NÃO tiver permissao, ele redireciona para a pagina SEM_ACESSO
            if(!$acl->isAllowed($user->role, $request->getControllerName(), $request->getActionName())) {
                $mysession->destination_url = $request->getPathInfo();
 
                return Zend_Controller_Action_HelperBroker::getStaticHelper('redirector')->setGotoUrl('index/semacesso');
            }
        } else {
            //usuario que não está logado é redirecionado para o login
            if(!$acl->isAllowed($this->_defaultRole, $request->getControllerName(), $request->getActionName())) {
                $mysession->destination_url = $request->getPathInfo();
 
                return Zend_Controller_Action_HelperBroker::getStaticHelper('redirector')->setGotoUrl('auth/login');
            }
        }
    }
}