<?php
namespace Jbig3User\Backend\Controller\Role\Insert;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Debug\Debug;

use Jbig3User\Backend\Controller\Role\Insert\RoleInsertController;

class RoleInsertControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sl)
    {
        $sm = $sl->getServiceLocator();

        $backendRoleInsertServiceObj = $sm->get('backendRoleInsertServiceFactory-jbig3user');
        $translatorObj = $sm->get('translator');

        $ctr = new RoleInsertController();

        $ctr->setServiceObj($backendRoleInsertServiceObj);
        $ctr->setTranslatorObj($translatorObj);

        return $ctr;
    }
}