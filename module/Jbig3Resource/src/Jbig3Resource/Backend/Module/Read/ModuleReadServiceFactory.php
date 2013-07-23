<?php
namespace Jbig3Resource\Backend\Module\Read;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

class ModuleReadServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {

        $mapperEntityObj = null;
        $formObj = null;
        $mapperObj = $sm->get('moduleMapper-jbig3resource');

        $event = 'module-read';

        $srv = new ModuleReadService($mapperEntityObj, $formObj, $mapperObj);

        $srv->setEvent($event);

        return $srv;
    }
}