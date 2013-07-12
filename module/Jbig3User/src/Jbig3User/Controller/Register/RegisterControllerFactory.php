<?php
namespace Jbig3User\Controller\Register;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface,
    Zend\Debug\Debug;
use Jbig3User\Controller\Register\RegisterController;

class RegisterControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sl)
    {
        $sm = $sl->getServiceLocator();

        $registerService = $sm->get('registerServiceFactory-jbig3user');
        $translator = $sm->get('translator');

        $ctr = new RegisterController();

        $ctr->setRegisterService($registerService);
        $ctr->setTranslator($translator);

//        Debug::dump($translator);

        return $ctr;
    }
}