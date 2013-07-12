<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Gregory
 * Date: 19.06.13
 * Time: 13:15
 * To change this template use File | Settings | File Templates.
 */

namespace Jbig3Tryings\EventManager\Example01;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;
use Jbig3Tryings\EventManager\Example01\Trigger;

class TriggerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $trigger = new Trigger();

        $trigger->setEventManager(
            $serviceLocator->get('eventManager')
        );

        // Variante ohne Closure:
//        $loggingService = $serviceLocator->get('loggingService');
//
//        $greetingService->getEventManager()
//            ->attach(
//            'getGreeting',
//            array($loggingService, 'onGetGreeting')
//        );


        // Variante mit Closure (Lazy-Loading)
        $trigger->getEventManager()
            ->attach(
            'getGreeting',
            function ($e) use ($serviceLocator) {
                $serviceLocator
                    ->get('loggingTask-task-evm-jbig3tryings')
                    ->onGetGreeting($e);
            }
        );




        return $trigger;
    }
}