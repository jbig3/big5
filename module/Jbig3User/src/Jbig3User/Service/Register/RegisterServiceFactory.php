<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Gregory
 * Date: 15.06.13
 * Time: 10:50
 * To change this template use File | Settings | File Templates.
 */
namespace Jbig3User\Service\Register;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;
use Jbig3User\Service\Register\RegisterService;

class RegisterServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $formHydrator =  $sm->get('hydrator-jbig3base');
        $passwordBcrypt = $sm->get('bcrypt-jbig3base');
        $userEntity = $sm->get('userEntity-jbig3user');
        $registerForm = $sm->get('registerFormFactory-jbig3user');
        $userMapper = $sm->get('userMapperFactory-jbig3user');


        $srv = new RegisterService();

        $srv->setFormHydrator($formHydrator);
        $srv->setPasswordBcrypt($passwordBcrypt);
        $srv->setUserEntity($userEntity);
        $srv->setForm($registerForm);
        $srv->setUserMapper($userMapper);

        return $srv;
    }
}