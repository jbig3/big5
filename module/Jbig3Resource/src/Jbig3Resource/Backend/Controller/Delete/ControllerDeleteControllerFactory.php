<?php
namespace Jbig3Resource\Backend\Controller\Delete;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;
use Jbig3Resource\Module;

class ControllerDeleteControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sl)
    {
        $sm = $sl->getServiceLocator();

        $translatorObj = $sm->get('translator');
        $serviceObj = $sm->get('backendControllerDeleteServiceFactory-jbig3resource');

        $successRoute = 'backend-resource-controller-read';
        $successMessage = $translatorObj->translate('Erfolgsmeldung', Module::TEXT_DOMAIN);

        $srv = new ControllerDeleteController($serviceObj);

        $srv->setSuccessRoute($successRoute);
        $srv->setSuccessMessage($successMessage);
        $srv->setField();

        return $srv;
    }
}