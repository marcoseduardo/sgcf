<?php 


Class Model_Paciente extends Zend_Db_Table {


	protected $_name = 'paciente';
	protected $_primary = 'id_paciente';



	public function getPaciente($id){

		$id = (int) $id;
		$row = $this->fetchRow('id_paciente = ' . $id);

		if (! $row) {
			throw new Exception("Could not find row $id");
		}
		return $row->toArray();

	}

	
	public function adicionarPaciente ($nome_completo, $naturalidade, $profissao, $nacionalidade, $data_nasc, $endereco, $telefone)
	{
		$data = array('nome_completo' => $nome_completo, 'naturalidade' => $naturalidade,'profissao' => $profissao, 
		        'nacionalidade' => $nacionalidade, 'data_nasc' => $data_nasc, 'endereco' => $endereco, 'telefone' => telefone);
		 
		$this->insert($data);
	}

	public function editarPaciente($id, $nome_completo, $naturalidade, $profissao, $nacionalidade, $data_nasc, $endereco, $telefone)
	{
		$data = array('nome_completo' => $nome, 'senha'=> $senha);
		$this->update($data, 'id = ' . (int) $id);
	}
	
	
	public function removerPaciente ($id)
	{
		$this->delete('id =' . (int) $id);
	}
	
	
	 
	public function pesquisarPaciente ($nome_completo)
	{



	}
}		