<?php
namespace Jbig3Tryings\ServiceManager\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Jbig3Tryings\ServiceManager\Factory\FactoryController;

class FactoryControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $ctr = new FactoryController();

        $ctr->setGreetingService(
            $serviceLocator->getServiceLocator()
                ->get('greating-plugin-jbig3tryings')
        );

        return $ctr;
    }

//    public function createService(ServiceLocatorInterface $serviceLocator) {
//        /* @var $serviceLocator \Zend\Mvc\Controller\ControllerManager */
//        $sm   = $serviceLocator->getServiceLocator();
//        $depA = $sm->get('depA');
//        $depB = $sm->get('depB');
//        $controller = new \MyModule\Controller\MyController($depA, $depB);
//        return $controller;
//    }
}