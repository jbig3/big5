<?php
namespace Jbig3User\Frontend\Controller\Activate;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Debug\Debug;

use Jbig3User\Frontend\Controller\Activate\ActivateController;

class ActivateControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sl)
    {
        $sm = $sl->getServiceLocator();

        $activateService = $sm->get('frontendActivateServiceFactory-jbig3user');
        $translator = $sm->get('translator');

        $mailMessageObj = $sm->get('mailMessageObj');
        $mailTransportObj = $sm->get('mailTransportObj');

        $ctr = new ActivateController();

        $ctr->setServiceObj($activateService);
        $ctr->setTranslatorObj($translator);

        $ctr->setMailMessageObj($mailMessageObj);
        $ctr->setMailTransportObj($mailTransportObj);

        return $ctr;
    }
}