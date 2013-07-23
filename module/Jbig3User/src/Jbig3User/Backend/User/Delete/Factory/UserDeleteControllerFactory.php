<?php
namespace Jbig3User\Backend\User\Delete\Factory;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Debug\Debug;

use Jbig3User\Backend\User\Delete\UserDeleteController;

class UserDeleteControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sl)
    {
        $sm = $sl->getServiceLocator();

        $serviceObj = $sm->get('backendUserDeleteServiceFactory-jbig3user');

        $ctr = new UserDeleteController();

        $ctr->setServiceObj($serviceObj);

        return $ctr;
    }
}