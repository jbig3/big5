<?php
namespace Jbig3Resource\Backend\Module\Delete;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

class ModuleDeleteServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {

        $mapperEntityObj = null;
        $formObj = null;
        $mapperObj = $sm->get('moduleMapper-jbig3resource');

        $event = 'module-delete';

        $srv = new ModuleDeleteService($mapperEntityObj, $formObj, $mapperObj);

        $srv->setEvent($event);

        return $srv;
    }
}