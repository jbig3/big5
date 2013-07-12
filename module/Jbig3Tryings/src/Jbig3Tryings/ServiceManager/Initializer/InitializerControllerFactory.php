<?php
namespace Jbig3Tryings\ServiceManager\Initializer;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;
use Jbig3Tryings\ServiceManager\Initializer\InitializerController;

class InitializerControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $ctr = new InitializerController();

        $ctr->setPizzaSalami(
            $serviceLocator->getServiceLocator()
                ->get('PizzaSalami')
        );

        return $ctr;
    }
}