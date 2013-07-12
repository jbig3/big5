<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Gregory
 * Date: 19.06.13
 * Time: 13:15
 * To change this template use File | Settings | File Templates.
 */

namespace Jbig3Tryings\EventManager\Example04\Service;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;
use Jbig3Tryings\EventManager\Example04\Service\TriggerService,
    Jbig3Tryings\EventManager\Example04\Listener\ExampleListener;

class TriggerServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $triggerService = new TriggerService();

        $exampleListener = $serviceLocator->get('exampleListenerFactory-ex04-evm-jbig3tryings');

        $triggerService->getEventManager()
            ->attachAggregate($exampleListener);

        return $triggerService;
    }
}