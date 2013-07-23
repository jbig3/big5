<?php
namespace Jbig3Resource\Backend\Controller\Read;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

class ControllerReadControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sl)
    {
        $sm = $sl->getServiceLocator();

        $serviceObj = $sm->get('backendControllerReadServiceFactory-jbig3resource');

        $viewKey = 'controllerRead';

        $srv = new ControllerReadController($serviceObj);

        $srv->setViewKey($viewKey);

        return $srv;
    }
}