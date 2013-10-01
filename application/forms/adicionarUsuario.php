
<?php

class Form_adicionarUsuario extends Zend_Form{

    public function init()
    {
        $this->setName('usuario');
        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');
        $login = new Zend_Form_Element_Text('login');
        $login->setLabel('login')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty');

        $nome_completo = new Zend_Form_Element_Text('nome_completo');
        $nome_completo->setLabel('nome_completo')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty');

        $senha = new Zend_Form_Element_Password('senha');
        $senha->setLabel('senha')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty');
            
        $tipo = new Zend_Form_Element_Radio('tipo');
        $tipo = $this->createElement('radio','tipo');
        $tipo->setLabel('tipo:')
            ->addMultiOptions(array('professor' => 'Professor','aluno' => 'Aluno'))
            ->setSeparator('');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        $this->addElements(array($id, $login, $senha, $nome_completo, $tipo, $submit));    }


}



?>