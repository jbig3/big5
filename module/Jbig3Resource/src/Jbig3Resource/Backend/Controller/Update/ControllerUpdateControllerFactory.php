<?php
namespace Jbig3Resource\Backend\Controller\Update;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;
use Jbig3Resource\Module;

class ControllerUpdateControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sl)
    {
        $sm = $sl->getServiceLocator();

        $translatorObj = $sm->get('translator');
        $serviceObj = $sm->get('backendControllerUpdateServiceFactory-jbig3resource');

        $viewKey = 'controllerUpdate';
        $successRoute = 'backend-resource-controller-read';
        $successMessage = $translatorObj->translate('Erfolgsmeldung', Module::TEXT_DOMAIN);

        $srv = new ControllerUpdateController($serviceObj);

        $srv->setViewKey($viewKey);
        $srv->setSuccessRoute($successRoute);
        $srv->setSuccessMessage($successMessage);
        $srv->setField();

        return $srv;
    }
}