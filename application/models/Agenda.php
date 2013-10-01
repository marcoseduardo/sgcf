<?php

Class Model_Agenda extends Zend_Db_Table {


protected $_name = 'agenda';


	  protected $_referenceMap = array
    (
        array(
            'refTableClass' => 'Model_Usuario',
            'refColumns' => 'id',
            'columns' => 'id_usuario',
        ),
        array(
            'refTableClass' => 'Model_Paciente',
            'refColumns' => 'id_paciente',
            'columns' => 'id_paciente',
        )
    );




}

?>

