<?php
namespace Jbig3Resource\Backend\Module\Update;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

class ModuleUpdateServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {

        $mapperEntityObj = $sm->get('moduleEntity-jbig3resource');
        $formObj = $sm->get('backendModuleUpdateFormFactory-jbig3resource');
        $mapperObj = $sm->get('moduleMapper-jbig3resource');

        $event = 'module-update';

        $srv = new ModuleUpdateService($mapperEntityObj, $formObj, $mapperObj);

        $srv->setEvent($event);

        return $srv;
    }
}