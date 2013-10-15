<?php

class AgendaController extends Zend_Controller_Action
{

        public function init()
        {
                if ( !Zend_Auth::getInstance()->hasIdentity() ) {
                        return $this->_helper->redirector->goToRoute( array('controller' => 'auth'), null, true);
                }

        }

        public function indexAction(){
		
	$user = new Model_Usuario();
        $paciente = new Model_Paciente();
        $agenda = new Model_Agenda();

         
        // lista de usuários
        $users = $user->fetchAll();
        $this->view->assign('users', $users);

        $pacientes = $paciente->fetchAll();
        $this->view->assign('pacientes', $pacientes);

        $agendas = $agenda->fetchAll();
        $this->view->assign('agendas', $agendas);

        $agenda = $agenda->find(1)->current();
        $nome_professor = $agenda->nome_professor;
        $data_agenda = $agenda->data_hora;

		$agenda_user = $agenda->findParentRow('Model_Usuario');
		$agenda_paciente = $agenda->findParentRow('Model_Paciente');

		$this->view->assign('data_agenda', $data_agenda);
 		$this->view->assign('agenda_user', $agenda_user);
		$this->view->assign('nome_professor', $nome_professor);
		$this->view->assign('agenda_paciente', $agenda_paciente);
		


        }

}
?>

