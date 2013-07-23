<?php
namespace Jbig3Resource\Backend\Controller\Update;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

class ControllerUpdateServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {

        $mapperEntityObj = $sm->get('controllerEntity-jbig3resource');
        $formObj = $sm->get('backendControllerUpdateFormFactory-jbig3resource');
        $mapperObj = $sm->get('controllerMapper-jbig3resource');

        $event = 'controller-update';

        $srv = new ControllerUpdateService($mapperEntityObj, $formObj, $mapperObj);

        $srv->setEvent($event);

        return $srv;
    }
}