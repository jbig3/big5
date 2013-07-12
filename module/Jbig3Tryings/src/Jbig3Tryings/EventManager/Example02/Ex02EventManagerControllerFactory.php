<?php
namespace Jbig3Tryings\EventManager\Example02;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;
use Jbig3Tryings\EventManager\Controller\EventManagerController;

class Ex02EventManagerControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sl)
    {
        $ctr = new EventManagerController();
        $sm = $sl->getServiceLocator();
        $ctr->setTrigger($sm->get('SharedTriggerFactory-ex02-evm-jbig3tryings'));

        return $ctr;
    }
}