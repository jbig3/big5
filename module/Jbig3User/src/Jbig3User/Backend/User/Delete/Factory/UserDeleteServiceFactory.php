<?php
namespace Jbig3User\Backend\User\Delete\Factory;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Jbig3User\Backend\User\Delete\UserDeleteService;

class UserDeleteServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {

        $userMapper = $sm->get('generalUserMapperFactory-jbig3user');

        $srv = new UserDeleteService();

        $srv->setMapperObj($userMapper);

        return $srv;
    }
}