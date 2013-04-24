<?php 

class Form_Paciente extends Zend_form{

    public function init(){
    
		//teste
        $nome_completo = new Zend_Form_Element_Text('nome_completo');
        $nome_completo->setLabel('nome_completo')
        ->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty');
        
        $profissao = new Zend_Form_Element_Text('profissao');
        $profissao->setLabel('profissao')
        ->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty');
        
        $naturalidade = new Zend_Form_Element_Text('naturalidade');
        $naturalidade->setLabel('naturalidade')
        ->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty');
        
        $nacionalidade = new Zend_Form_Element_text('nacionalidade');
        $nacionalidade->setLabel('nacionalidade')
        ->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty');
        
        $data_nasc = new Zend_Form_Element_text('data_nasc');
        $data_nasc->setLabel('data_nasc')
        ->setRequired(true)
        ->addFilter('int');
        
        $tel_cel = new Zend_Form_Element_text('tel_cel');
        $tel_cel->setLabel('tel_cel')
        ->setRequired(true)
        ->addFilter('int');
        
        $tel_fixo = new Zend_Form_Element_text('tel_fixo');
        $tel_fixo->setLabel('tel_fixo')
        ->setRequired(true)
        ->addFilter('int');
         
        $logradouro = new Zend_Form_Element_text('logradouro');
        $logradouro->setLabel('logradouro')
        ->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty');
        
        $numero = new Zend_Form_Element_text('numero');
        $numero->setLabel('numero')
        ->setRequired(true)
        ->addFilter('int');
        
        $complemento = new Zend_Form_Element_text('complemento');
        $complemento->setLabel('complemento')
        ->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty');
        
        $cep = new Zend_Form_Element_text('cep');
        $cep->setLabel('cep')
        ->setRequired(true)
        ->addFilter('int');
        
        $bairro = new Zend_Form_Element_text('bairro');
        $bairro->setLabel('bairro')
        ->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty');
        
        $cidade = new Zend_Form_Element_text('cidade');
        $cidade->setLabel('cidade')
        ->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty');
         
        $estado = new Zend_Form_Element_text('estado');
        $estado->setLabel('estado')
        ->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty');
        
        
    }
    
}