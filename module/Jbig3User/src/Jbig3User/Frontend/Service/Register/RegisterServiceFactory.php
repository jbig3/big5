<?php

namespace Jbig3User\Frontend\Service\Register;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Jbig3User\Frontend\Service\Register\RegisterService;

class RegisterServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $formHydrator =  $sm->get('hydrator-jbig3base');
        $passwordBcrypt = $sm->get('bcrypt-jbig3base');
        $userEntity = $sm->get('generalUserEntity-jbig3user');
        $registerForm = $sm->get('frontendRegisterFormFactory-jbig3user');
        $userMapper = $sm->get('generalUserMapperFactory-jbig3user');


        $srv = new RegisterService();

        $srv->setFormHydrator($formHydrator);
        $srv->setPasswordBcrypt($passwordBcrypt);
        $srv->setEntityObj($userEntity);
        $srv->setFormObj($registerForm);
        $srv->setMapperObj($userMapper);

        return $srv;
    }
}