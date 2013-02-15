<?php 


	Class Model_Usuario extends Zend_Db_Table {


		protected $_name = 'usuario';
		protected $_primary = 'id';
		protected $_role;


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
	        $data = array('nome_completo' => $nome, 'senha'=> $senha);
	        $this->update($data, 'id = ' . (int) $id);
	    }
	    public function editarContaUsuario($id, $login, $senha, $nome_completo, $tipo )
	    {
			$data = array('login' => $login, 'senha' => $senha, 'nome_completo' => $nome_completo, 'tipo' => $tipo, 'role' => $tipo) ;
	        $this->update($data, 'id = ' . (int) $id);
	    }


	     public function adicionarUsuario ($login, $nome_completo, $senha, $tipo)
    	{
	   	    $data = array('login' => $login, 'nome_completo' => $nome_completo, 'senha' => $senha, 'tipo' => $tipo, 'role' => $tipo) ;
	        $this->insert($data);
    	}
    	 public function removerUsuario ($id)
   		 {
      	    $this->delete('id =' . (int) $id);
    	}


		 public function setRole($role)
	    {
	        $this->_role = (string) $role;
	 
	        return $this;
	    }
	 
	    public function getRole()
	    {
	        return $this->_role;
	    }


}