<?php

class PacienteController extends Zend_Controller_Action
{

	public function init()
	{
		if ( !Zend_Auth::getInstance()->hasIdentity() ) {
			return $this->_helper->redirector->goToRoute( array('controller' => 'auth'), null, true);
		}

	}

	public function indexAction()
	{
	//Cria o paciente e passa para a view
		$paciente = new Model_Paciente();
		$this->view->pacientes = $paciente->fetchAll();
	}


	public function pacienteAction()
	{
		$paciente = new Model_Paciente();
		
		$id = $this->_getParam('id', 0);
		if ($id > 0) {
			$this->view->user = $paciente->getPaciente($id);
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
				$profissao = $form->getValue('profissao');
				$naturalidade = $form->getValue('naturalidade');
				$nacionalidade = $form->getValue('nacionalidade');
				$data_nasc = $form->getValue('data_nasc');
				$tel_fixo = $form->getValue('tel_fixo');
				$tel_cel = $form->getValue('tel_cel');
				$logradouro = $form->getValue('logradouro');
				$numero = $form->getValue('numero');
				$complemento = $form->getValue('complemento');
				$cep = $form->getValue('cep');
				$bairro = $form->getValue('bairro');
				$cidade = $form->getValue('cidade');
				$estado = $form->getValue('estado');
				
				$paciente = new Model_Paciente();

				$paciente->adicionarPaciente($id_paciente, $nome_completo, $profissao, $naturalidade, $nacionalidade, $data_nasc, $tel_cel, $tel_fixo, $logradouro, $numero, $complemento, $cep, $bairro, $cidade, $estado);
				$this->_helper->redirector('index');
			} else {
				$form->populate($formData);
			}
		}
	}

	public function editarAction(){

		
		$form = new Form_editarPaciente();
		$form->submit->setLabel('Editar');
		$this->view->form = $form;
		if ($this->getRequest()->isPost()) {
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData)) {
				$id_paciente = $pacientes->id_paciente;
				$nome_completo = $form->getValue('nome_completo');
				$profissao = $form->getValue('profissao');
				$naturalidade = $form->getValue('naturalidade');
				$nacionalidade = $form->getValue('nacionalidade');
				$data_nasc = $form->getValue('data_nasc');
				$tel_fixo = $form->getValue('tel_fixo');
				$tel_cel = $form->getValue('tel_cel');
				$logradouro = $form->getValue('logradouro');
				$numero = $form->getValue('numero');
				$complemento = $form->getValue('complemento');
				$cep = $form->getValue('cep');
				$bairro = $form->getValue('bairro');
				$cidade = $form->getValue('cidade');
				$estado = $form->getValue('estado');


				$pacientes = new Model_Paciente();
				$pacientes->editarPaciente($id_paciente, $nome_completo, $profissao, $naturalidade, $nacionalidade, $data_nasc, $tel_cel, $tel_fixo, $logradouro, $numero, $complemento, $cep, $bairro, $cidade, $estado);

				return $this->_helper->redirector->goToRoute( array('controller' => 'Paciente'), null, true);
			} else {
				$form->populate($formData);
			}
			
		}
		else {
			$id = $this->_getParam('id', 0);
			$pacientes = new Model_Paciente();
			$form->populate($pacientes->getPaciente($id));
			
		}
	}

	public function removerpacienteAction()
	{
		if ($this->getRequest()->isPost()) {
			$del = $this->getRequest()->getPost('del');
			if ($del == 'Sim') {
				$id = $this->getRequest()->getPost('id_paciente');
				$pacientes = new Model_Paciente();
				$pacientes->removerPaciente;
			}
			return $this->_helper->redirector->goToRoute( array('controller' => 'admin'), null, true);
		} else {
			$id = $this->_getParam('id_paciente', 0);
			$pacientes = new Model_Paciente();
			$this->view->user = $pacientes->getPaciente($id);
		}

	}

	public function informacoesAction()
	{

	//criando o objeto
		$pacientes = new Model_Paciente();
	//enviando para a view o ususario logado, passando a id direto na função

		$id = $this->_getParam('id', 0);
		if ($id > 0) {
			$this->view->paciente = $pacientes->getPaciente($id);
		}
	}

}
