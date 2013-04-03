<?php
// library/My/Acl.php
class My_Acl extends Zend_Acl
{
    public function __construct()
    {
        // Add a new role called "aluno"
        $this->addRole(new Zend_Acl_Role('aluno'));
        // Add a role called professor, which inherits from aluno
        $this->addRole(new Zend_Acl_Role('professor'), 'aluno');
        // Add a role called admin, which inherits from professor
 
        // Add some resources in the form controller::action
        $this->add(new Zend_Acl_Resource('error'));
        $this->add(new Zend_Acl_Resource('auth'));
        //$this->add(new Zend_Acl_Resource('auth'));
        $this->add(new Zend_Acl_Resource('admin'));
        $this->add(new Zend_Acl_Resource('Usuario'));

        $this->add(new Zend_Acl_Resource('index'));
 
        // Allow alunos to see the error, login and index pages
        $this->allow('aluno', 'error');
        $this->allow('aluno', 'auth');
        $this->allow('aluno', 'index');
        $this->allow('aluno', 'Usuario');
        $this->allow('aluno', 'admin');

        // Allow professors to access logout and the index action from the professor controller
        //$this->allow('professor', 'auth');
        //$this->allow('professor', 'admin');
        // Allow admin to access admin controller, index action
        
        // You will add here roles, resources and authorization specific to your application, the above are some examples
    }
}