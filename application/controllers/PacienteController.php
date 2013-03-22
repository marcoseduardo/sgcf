<?php

class PacienteController extends Zend_Controller_Action
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
		//Cria o paciente e passa para a view
		$Paciente = new Model_Paciente();
		$this->view->Paciente = $Paciente->fetchAll();

	
	}
	
	
	public function pacienteAction()
	{
	    $Paciente = new Model_Paciente();
	    
	    $id = $this->_getParam('id', 0);
	    if ($id > 0) {
	    	$this->view->user = $Paciente->getPaciente($id);
	    }
	    else{
	    	$this->view->user = $Paciente>getPaciente($Paciente->id);
	    }
	    
	}
	
	
	public function adicionarAction()
	{
		$form = new Form_adicionarPaciente();
		$form->submit->setLabel('Adicionar');
		$this->view->form = $form;
		if ($this->getRequest()->isPost()) {
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData)) {
	
				$nome_completo = $form->getValue('nome_completo');
				$naturalidade = $form->getValue('naturalidade');
				$profissao = $form->getValue('profissao');
				$nacionalidade = $form->getValue('nacionalidade');
				$data_nasc = $form->getValue('data_nasc');
				$endereco = $form->getValue('endereco');
				$telefone = $form->getValue('telefone');
				
				
				$Paciente = new Model_Paciente();
	
				$Paciente->adicionarPaciente($nome_completo, $naturalidade, $profissao, $nacionalidade, $data_nasc, $endereco, $telefone);
				$this->_helper->redirector('index');
			} else {
				$form->populate($formData);
			}
		}
	}
}