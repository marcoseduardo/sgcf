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

	
	public function adicionarPaciente ($id_paciente, $nome_completo, $profissao, $naturalidade, $nacionalidade, $data_nasc, $tel_cel, $tel_fixo, $logradouro, $numero, $complemento, $cep, $bairro, $cidade, $estado)
	{
		$data = array('nome_completo' => $nome_completo, 'profissao' => $profissao, 'naturalidade' => $naturalidade, 'nacionalidade' => $nacionalidade, 'data_nasc' => $data_nasc, 'tel_cel' => $tel_cel, 'tel_fixo' =>$tel_fixo, 'logradouro' => $logradouro, 'numero' => $numero, 'complemento' => $complemento, 'cep' => $cep, 'bairro' => $bairro, 'cidade' => $cidade, 'estado' => estado);
		 
		$this->insert($data);
	}

	public function editarPaciente($id, $nome_completo, $profissao, $naturalidade, $nacionalidade, $data_nasc, $tel_cel, $tel_fixo, $logradouro, $numero, $complemento, $cep, $bairro, $cidade, $estado)
	{
		$data = array('nome_completo' => $nome_completo, 'profissao' => $profissao, 'naturalidade' => $naturalidade, 'nacionalidade' => $nacionalidade, 'data_nasc' => $data_nasc, 'tel_cel' => $tel_cel, 'tel_fixo' =>$tel_fixo, 'logradouro' => $logradouro, 'numero' => $numero, 'complemento' => $complemento, 'cep' => $cep, 'bairro' => $bairro, 'cidade' => $cidade, 'estado' => estado);
		$this->update($data, 'id_paciente = ' . (int) $id);
	}
	
	
	public function removerPaciente ($id)
	{
		$this->delete('id_paciente =' . (int) $id);
	}
	
	
	 
	public function pesquisarPaciente ($nome_completo)
	{



	}
}		