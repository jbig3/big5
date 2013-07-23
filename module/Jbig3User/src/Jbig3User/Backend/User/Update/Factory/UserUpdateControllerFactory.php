<?php
namespace Jbig3User\Backend\User\Update\Factory;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Debug\Debug;

use Jbig3User\Backend\User\Update\UserUpdateController;

class UserUpdateControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sl)
    {
        $sm = $sl->getServiceLocator();

        $serviceObj = $sm->get('backendUserUpdateServiceFactory-jbig3user');

        $ctr = new UserUpdateController();

        $ctr->setServiceObj($serviceObj);

        return $ctr;
    }
}