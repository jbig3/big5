<?php
namespace Jbig3User\Backend\User\Update\Factory;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Jbig3User\Backend\User\Update\UserUpdateService;

class UserUpdateServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {

        $userMapper = $sm->get('generalUserMapperFactory-jbig3user');

        $srv = new UserUpdateService();

        $srv->setMapperObj($userMapper);

        return $srv;
    }
}