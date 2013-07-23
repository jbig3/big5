<?php
namespace Jbig3User\Frontend\Controller\Register;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Debug\Debug;

use Jbig3User\Frontend\Controller\Register\RegisterController;

class RegisterControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sl)
    {
        $sm = $sl->getServiceLocator();

        $registerServiceObj = $sm->get('frontendRegisterServiceFactory-jbig3user');
        $translatorObj = $sm->get('translator');

        $ctr = new RegisterController();

        $ctr->setServiceObj($registerServiceObj);
        $ctr->setTranslatorObj($translatorObj);

        return $ctr;
    }
}