    <?php

    class UsuarioController extends Zend_Controller_Action
    {

    	public function init()
    	{
         if ( !Zend_Auth::getInstance()->hasIdentity() ) {
            return $this->_helper->redirector->goToRoute( array('controller' => 'auth'), null, true);
        }
           		//$usuario = Zend_Auth::getInstance()->getIdentity();
                //$this->view->usuario = $usuario;

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

      $id = $this->_getParam('id', 0);
      if ($id > 0) {
        $this->view->user = $usuarios->getUsuario($id);
    }else{    
        $this->view->user = $usuarios->getUsuario($usuario->id);
    }



}

public function adicionarAction()
{
    $form = new Form_adicionarUsuario();
    $form->submit->setLabel('Adicionar');
    $this->view->form = $form;
    if ($this->getRequest()->isPost()) {
        $formData = $this->getRequest()->getPost();
        if ($form->isValid($formData)) {

            $login = $form->getValue('login');
            $senha = sha1($form->getValue('senha'));
            $nome_completo = $form->getValue('nome_completo');
            $tipo = $form->getValue('tipo');

            $usuario = new Model_Usuario();

            $usuario->adicionarUsuario($login,$nome_completo, $senha, $tipo);
            $this->_helper->redirector('index');
        } else {
            $form->populate($formData);
        }
    }
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
}  else {
    $usuario = Zend_Auth::getInstance()->getIdentity();
    $usuarios = new Model_Usuario();
                    //$form->setDefaults($usuarios->getUsuario($id));
    $form->populate($usuarios->getUsuario($usuario->id));

}
}

public function removerAction()
{
    if ($this->getRequest()->isPost()) {
        $del = $this->getRequest()->getPost('del');
        if ($del == 'Sim') {
            $id = $this->getRequest()->getPost('id');
            $usuarios = new Model_Usuario();
            $usuarios->removerUsuario($id);
        }
        return $this->_helper->redirector->goToRoute( array('controller' => 'admin'), null, true);
    } else {
        $id = $this->_getParam('id', 0);
        $usuarios = new Model_Usuario();
        $this->view->user = $usuarios->getUsuario($id);
    }

}
public function editarContaAction(){

    $form = new Form_adicionarUsuario();
    $form->submit->setLabel('Save');
    $this->view->form = $form;
    if ($this->getRequest()->isPost()) {
        $formData = $this->getRequest()->getPost();
        if ($form->isValid($formData)) {
            $id = (int) $form->getValue('id');
            $login = $form->getValue('login');
            $nome_completo = $form->getValue('nome_completo');
            $senha = sha1($form->getValue('senha'));
            $tipo = $form->getValue('tipo');

            $usuarios = new Model_Usuario();
            $usuarios->editarContaUsuario($id, $login, $senha, $nome_completo, $tipo);

                    //redireciona pra Action Index
                    //$this->_helper->redirector('index');

                   //redireciona pro controller admin     
            return $this->_helper->redirector->goToRoute( array('controller' => 'admin'), null, true);


        } else {
            $form->populate($formData);
        }
    }  else {
        $id = $this->_getParam('id', 0);
        if ($id > 0) {
            $usuarios = new Model_Usuario();
            $form->populate($usuarios->getUsuario($id));
        }

    }   
}

}

