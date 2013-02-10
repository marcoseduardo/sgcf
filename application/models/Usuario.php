<?php 


	Class Model_Usuario extends Zend_Db_Table {


		protected $_name = 'usuario';
		protected $_primary = 'id';

		public function getUsuario($id){

		$id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        
        if (! $row) {
            throw new Exception("Could not find row $id");
        }
        	return $row->toArray();

		}

		public function editarUsuario($id, $nome, $senha)
	    {
	        $data = array('nome_completo' => $nome);
	        $this->update($data, 'id = ' . (int) $id);
	    }
		


}