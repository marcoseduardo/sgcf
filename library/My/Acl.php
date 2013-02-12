<?php
// library/My/Acl.php
class My_Acl extends Zend_Acl
{
    public function __construct()
    {
        // Add a new role called "guest"
        $this->addRole(new Zend_Acl_Role('guest'));
        // Add a role called user, which inherits from guest
        $this->addRole(new Zend_Acl_Role('user'), 'guest');
        // Add a role called admin, which inherits from user
        $this->addRole(new Zend_Acl_Role('admin'), 'user');
 
        // Add some resources in the form controller::action
        $this->add(new Zend_Acl_Resource('error'));
        $this->add(new Zend_Acl_Resource('auth'));
        //$this->add(new Zend_Acl_Resource('auth'));
        $this->add(new Zend_Acl_Resource('admin'));
        $this->add(new Zend_Acl_Resource('Usuario'));

        $this->add(new Zend_Acl_Resource('index'));
 
        // Allow guests to see the error, login and index pages
        $this->allow('guest', 'error');
        $this->allow('guest', 'auth');
        $this->allow('guest', 'index');
        $this->allow('guest', 'Usuario');
        $this->allow('guest', 'admin');
        // Allow users to access logout and the index action from the user controller
        $this->allow('user', 'auth');
        //$this->allow('user', 'admin');
        // Allow admin to access admin controller, index action
        $this->allow('admin', 'admin');
        $this->allow('admin', 'Usuario');
 
        // You will add here roles, resources and authorization specific to your application, the above are some examples
    }
}