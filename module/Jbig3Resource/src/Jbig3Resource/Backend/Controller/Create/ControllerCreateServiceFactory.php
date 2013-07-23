<?php
namespace Jbig3Resource\Backend\Controller\Create;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

class ControllerCreateServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {

        $mapperEntityObj = $sm->get('controllerEntity-jbig3resource');
        $formObj = $sm->get('backendControllerCreateFormFactory-jbig3resource');
        $mapperObj = $sm->get('controllerMapper-jbig3resource');

        $event = 'module-create';

        $srv = new ControllerCreateService($mapperEntityObj, $formObj, $mapperObj);

        $srv->setEvent($event);

        return $srv;
    }
}