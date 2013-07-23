<?php
namespace Jbig3Resource\Backend\Module\Delete;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;
use Jbig3Resource\Module;

class ModuleDeleteControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sl)
    {
        $sm = $sl->getServiceLocator();

        $translatorObj = $sm->get('translator');
        $serviceObj = $sm->get('backendModuleDeleteServiceFactory-jbig3resource');

        $successRoute = 'backend-resource-module-read';
        $successMessage = $translatorObj->translate('Erfolgsmeldung', Module::TEXT_DOMAIN);

        $srv = new ModuleDeleteController($serviceObj);

        $srv->setSuccessRoute($successRoute);
        $srv->setSuccessMessage($successMessage);
        $srv->setField();

        return $srv;
    }
}