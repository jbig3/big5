<?php
namespace Jbig3User\Frontend\Form\Register;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Debug\Debug;

use Jbig3User\Frontend\Form\Register\RegisterForm;

class RegisterFormFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $name = 'register';
        $translator = $sm->get('translator');
        $action = '/user/register';
        $inputFilter = $sm->get('frontendRegisterFormFilterFactory-jbig3user');

        $srv = new RegisterForm($name, $translator, $action, $inputFilter);

        return $srv;
    }


}