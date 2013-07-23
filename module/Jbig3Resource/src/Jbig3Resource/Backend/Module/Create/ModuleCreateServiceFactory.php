<?php
namespace Jbig3Resource\Backend\Module\Create;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

class ModuleCreateServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {

        $mapperEntityObj = $sm->get('moduleEntity-jbig3resource');
        $formObj = $sm->get('backendModuleCreateFormFactory-jbig3resource');
        $mapperObj = $sm->get('moduleMapper-jbig3resource');

        $event = 'module-create';

        $srv = new ModuleCreateService($mapperEntityObj, $formObj, $mapperObj);

        $srv->setEvent($event);

        return $srv;
    }
}