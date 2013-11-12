<?php

class ConsultaController extends Zend_Controller_Action
{

	public function init()
	{
		if ( !Zend_Auth::getInstance()->hasIdentity() ) {
			return $this->_helper->redirector->goToRoute( array('controller' => 'auth'), null, true);
		}

	}
	

	public function indexAction(){
		
		$agendas = new Model_Agenda();
		$consultas = new Model_Consulta();
		
		
		$agendas = $agendas->fetchAll();
		$this->view->assign('agendas', $agendas);
		
		$agendas = $agendas->find(1)->current();
		$nome_professor = $agendas->nome_professor;
		$data_agenda = $agendas->data_hora;
		
		
		$consultas = $consultas->fetchAll();
		
		
		$this->view->assign('data_agenda', $data_agenda);
		$this->view->assign('consulta', $consultas);
		$this->view->assign('nome_professor', $nome_professor);
	
		
	}
	

}

