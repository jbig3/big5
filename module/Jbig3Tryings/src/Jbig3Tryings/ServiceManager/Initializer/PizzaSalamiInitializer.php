<?php
namespace Jbig3Tryings\ServiceManager\Initializer;

use Zend\ServiceManager\ServiceLocatorInterface,
    Zend\ServiceManager\InitializerInterface;
use Jbig3Tryings\ServiceManager\Initializer\WheatFlourAwareInterface;

/**
 * Pizza Salami entity class
 * 
 * @package    Pizza
 */
class PizzaSalamiInitializer implements InitializerInterface
{
    public function initialize($instance, ServiceLocatorInterface $serviceLocator)
    {
        if ($instance instanceof WheatFlourAwareInterface) {
            $instance->setWheatFlourCrust($serviceLocator->get('WheatFlour'));
        }
    }
}


