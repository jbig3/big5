<?php
namespace Jbig3User\Form\Register;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface,
    Zend\Debug\Debug;

use Jbig3User\Form\Register\RegisterForm;

class RegisterFormFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $name = 'register';
        $translator = $sm->get('translator');
        $action = '/user/register';
        $inputFilter = $sm->get('registerFormFilterFactory-jbig3user');

        $srv = new RegisterForm($name, $translator, $action, $inputFilter);

        return $srv;
    }


}