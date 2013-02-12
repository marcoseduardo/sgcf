<?php

class UsuarioController extends Zend_Controller_Action
{

	public function init()
	{
		   if ( !Zend_Auth::getInstance()->hasIdentity() ) {
        return $this->_helper->redirector->goToRoute( array('controller' => 'auth'), null, true);
    }
   		$usuario = Zend_Auth::getInstance()->getIdentity();
        $this->view->usuario = $usuario;

	}


    public function indexAction()
	{
		//cria o objeto Usuario e passa pra view
		$usuarios = new Model_Usuario();
		$this->view->usuarios = $usuarios->fetchAll();

	
	}

	  public function minhacontaAction()
	{

		//pega a objeto usuario logado	
		$usuario = Zend_Auth::getInstance()->getIdentity();
		
		//criando o objeto 
		$usuarios = new Model_Usuario();
		//enviando para a view o ususario logado, passando a id direto na função
		$this->view->user = $usuarios->getUsuario($usuario->id);
	}

	public function editarAction(){

        // pega o ID do usuario logado para informar na alteração dos dados
		$usuario = Zend_Auth::getInstance()->getIdentity();

		$form = new Form_Usuario();
        $form->submit->setLabel('Save');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $id = $usuario->id;
                $nome = $form->getValue('nome_completo');
                $senha = sha1($form->getValue('senha'));

 
                $usuarios = new Model_Usuario();
                $usuarios->editarUsuario($id, $nome, $senha);
                
                //redireciona pra Action Index
                //$this->_helper->redirector('index');

               //redireciona pro controller admin     
               return $this->_helper->redirector->goToRoute( array('controller' => 'admin'), null, true);


            } else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id', 0);
            if ($id > 0) {
                $usuarios = new Model_Usuario();
                $form->populate($usuarios->getUsuario($id));
            }
        }
	}


}

