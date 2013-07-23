<?php
namespace Jbig3User\Backend\Controller\Role\Read;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Debug\Debug;

use Jbig3User\Backend\Controller\Role\Read\RoleReadController;

class RoleReadControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sl)
    {
        $sm = $sl->getServiceLocator();

        $backendRoleReadServiceObj = $sm->get('backendRoleReadServiceFactory-jbig3user');

        $ctr = new RoleReadController();

        $ctr->setServiceObj($backendRoleReadServiceObj);

        return $ctr;
    }
}