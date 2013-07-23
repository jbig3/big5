<?php
namespace Jbig3User\Backend\Controller\Insert;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Debug\Debug;

use Jbig3User\Backend\Controller\Insert\InsertController;

class InsertControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sl)
    {
        $sm = $sl->getServiceLocator();

        $backendInsertServiceObj = $sm->get('backendInsertServiceFactory-jbig3user');
        $translatorObj = $sm->get('translator');

        $ctr = new InsertController();

        $ctr->setServiceObj($backendInsertServiceObj);
        $ctr->setTranslatorObj($translatorObj);

        return $ctr;
    }
}