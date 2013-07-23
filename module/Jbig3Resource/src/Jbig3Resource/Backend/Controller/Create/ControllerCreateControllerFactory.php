<?php
namespace Jbig3Resource\Backend\Controller\Create;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;
use Jbig3Resource\Module;

class ControllerCreateControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sl)
    {
        $sm = $sl->getServiceLocator();

        $translatorObj = $sm->get('translator');
        $serviceObj = $sm->get('backendControllerCreateServiceFactory-jbig3resource');

        $viewKey = 'controllerCreate';
        $successRoute = 'backend-resource-controller-read';
        $successMessage = $translatorObj->translate('Erfolgsmeldung', Module::TEXT_DOMAIN);

        $srv = new ControllerCreateController($serviceObj);

        $srv->setViewKey($viewKey);
        $srv->setSuccessRoute($successRoute);
        $srv->setSuccessMessage($successMessage);

        return $srv;
    }
}