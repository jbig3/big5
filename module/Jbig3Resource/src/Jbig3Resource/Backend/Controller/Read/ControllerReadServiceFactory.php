<?php
namespace Jbig3Resource\Backend\Controller\Read;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

class ControllerReadServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {

        $mapperEntityObj = null;
        $formObj = null;
        $mapperObj = $sm->get('controllerMapper-jbig3resource');

        $event = 'controller-read';

        $srv = new ControllerReadService($mapperEntityObj, $formObj, $mapperObj);

        $srv->setEvent($event);

        return $srv;
    }
}