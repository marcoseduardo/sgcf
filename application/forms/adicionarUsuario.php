
<?php

class Form_adicionarUsuario extends Zend_Form{

    public function init()
    {
        $this->setName('usuario');
        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');
        $login = new Zend_Form_Element_Text('login');
        $login->setLabel('Login')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty')
            ->setAttrib('class', 'usuario');


        $nome_completo = new Zend_Form_Element_Text('nome_completo');
        $nome_completo->setLabel('Nome Completo')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty');

        $senha = new Zend_Form_Element_Password('senha');
        $senha->setLabel('Senha')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty');
            
        $tipo = new Zend_Form_Element_Radio('tipo');
        $tipo = $this->createElement('radio','tipo');
        $tipo->setLabel('Tipo:')
            ->addMultiOptions(array('professor' => 'Professor','aluno' => 'Aluno'))
            ->setSeparator('');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('class', 'btn btn-info');
               


        $this->addElements(array($id, $login, $senha, $nome_completo, $tipo, $submit));  

        $this->setElementDecorators(array(
            'viewHelper',
            'Errors'
            
            ));

        



        $this->setDecorators(array(
            'FormElements',
            'Form',
            'Errors'
            ));

          }
        
}



?>