<?php

class Form_Usuario extends Zend_Form
{

    public function init()
    {
        $this->setName('usuario');
        $nome = new Zend_Form_Element_Text('nome_completo');
        $nome->setLabel('nome_completo')
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
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        $this->addElements(array($nome, $senha, $submit));
    }


}

