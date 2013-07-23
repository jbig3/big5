<?php
namespace Jbig3Resource\Backend\Controller\Delete;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

class ControllerDeleteServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $mapperEntityObj = null;
        $formObj = null;
        $mapperObj = $sm->get('controllerMapper-jbig3resource');

        $event = 'controller-delete';

        $srv = new ControllerDeleteService($mapperEntityObj, $formObj, $mapperObj);

        $srv->setEvent($event);

        return $srv;
    }
}