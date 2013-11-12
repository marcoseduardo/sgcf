<?php
Class Model_Consulta extends Zend_Db_Table {
	protected $_name = 'consulta';
	
	protected $_referenceMap = array
	(
			array(
					'refTableClass' => 'Model_Agenda',
					'refColumns' => 'id_agenda',
					'columns' => 'id_agenda',
			),

			array(
					'refTableClass' => 'Model_Agenda',
					'refColumns' => 'data_hora',
					'columns' => 'dataHora',		
			),
			
			array(
					'refTableClass' => 'Model_Agenda',
					'refColumns' => 'nome_professor',
					'columns' => 'nome_professor',				
			),
			
			array(
					'refTableClass' => 'Model_Agenda',
					'refColumns' => 'id_paciente',
					'columns' => 'id_paciente',
			),
	
			array(
					'refTableClass' => 'Model_Agenda',
					'refColumns' => 'id_usuario',
					'columns' => 'id_usuario',
			),
			
	);
	
	
}