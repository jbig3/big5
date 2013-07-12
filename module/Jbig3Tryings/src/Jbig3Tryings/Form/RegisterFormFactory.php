<?php
namespace Jbig3Tryings\Form;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface,
    Zend\Debug\Debug;

use Jbig3Tryings\Form\RegisterForm as Jbig3RegisterForm;

class RegisterFormFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $name = 'register';
        $baseForm = $sm->get('jbig3-form-tryingsBaseFormFilterFactory');

        $srv = new Jbig3RegisterForm($name, $baseForm);

        return $srv;
    }


}