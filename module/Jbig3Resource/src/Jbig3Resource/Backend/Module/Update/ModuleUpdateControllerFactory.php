<?php
namespace Jbig3Resource\Backend\Module\Update;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;
use Jbig3Resource\Module;

class ModuleUpdateControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sl)
    {
        $sm = $sl->getServiceLocator();

        $translatorObj = $sm->get('translator');
        $serviceObj = $sm->get('backendModuleUpdateServiceFactory-jbig3resource');

        $viewKey = 'moduleUpdate';
        $successRoute = 'backend-resource-module-read';
        $successMessage = $translatorObj->translate('Erfolgsmeldung', Module::TEXT_DOMAIN);

        $srv = new ModuleUpdateController($serviceObj);

        $srv->setViewKey($viewKey);
        $srv->setSuccessRoute($successRoute);
        $srv->setSuccessMessage($successMessage);
        $srv->setField();

        return $srv;
    }
}