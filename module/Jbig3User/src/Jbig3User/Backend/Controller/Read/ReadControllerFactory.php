<?php
namespace Jbig3User\Backend\Controller\Read;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Debug\Debug;

use Jbig3User\Backend\Controller\Read\ReadController;

class ReadControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sl)
    {
        $sm = $sl->getServiceLocator();

        $backendReadServiceObj = $sm->get('backendReadServiceFactory-jbig3user');

        $ctr = new ReadController();

        $ctr->setServiceObj($backendReadServiceObj);

        return $ctr;
    }
}