<?php
namespace Jbig3User\Form\Register;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface,
    Zend\Debug\Debug;

use Jbig3User\Form\Register\RegisterFormFilter;

class RegisterFormFilterFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $emailRecordExistsValidator = $sm->get('emailRecordExistsFactory-jbig3user');

        $srv = new RegisterFormFilter($emailRecordExistsValidator, null);

        return $srv;
    }


}