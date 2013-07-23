<?php
namespace Jbig3Resource\Backend\Module\Read;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

class ModuleReadControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sl)
    {
        $sm = $sl->getServiceLocator();

        $serviceObj = $sm->get('backendModuleReadServiceFactory-jbig3resource');

        $viewKey = 'moduleRead';

        $srv = new ModuleReadController($serviceObj);

        $srv->setViewKey($viewKey);

        return $srv;
    }
}