<?php
namespace Jbig3Resource\Backend\Module\Create;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;
use Jbig3Resource\Backend\Module\Create\ModuleCreateController;
use Jbig3Resource\Module;

class ModuleCreateControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sl)
    {
        $sm = $sl->getServiceLocator();

        $translatorObj = $sm->get('translator');
        $serviceObj = $sm->get('backendModuleCreateServiceFactory-jbig3resource');

        $viewKey = 'moduleCreate';
        $successRoute = 'backend-resource-module-read';
        $successMessage = $translatorObj->translate('Erfolgsmeldung', Module::TEXT_DOMAIN);

        $srv = new ModuleCreateController($serviceObj);

        $srv->setViewKey($viewKey);
        $srv->setSuccessRoute($successRoute);
        $srv->setSuccessMessage($successMessage);

        return $srv;
    }
}