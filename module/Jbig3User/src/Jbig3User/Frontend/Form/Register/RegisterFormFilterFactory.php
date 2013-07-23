<?php
namespace Jbig3User\Frontend\Form\Register;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Debug\Debug;

use Jbig3User\Frontend\Form\Register\RegisterFormFilter;

class RegisterFormFilterFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $emailRecordExistsValidator = $sm->get('generalEmailRecordExistsFactory-jbig3user');

        $srv = new RegisterFormFilter($emailRecordExistsValidator, null);

        return $srv;
    }


}