<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Gregory
 * Date: 19.06.13
 * Time: 13:15
 * To change this template use File | Settings | File Templates.
 */

namespace Jbig3Tryings\EventManager\Example04\Listener;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;
use Jbig3Tryings\EventManager\Example04\Listener\ExampleListener;

class ExampleListenerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sl)
    {
        $exampleListener = new ExampleListener();

        $listenerEventTask = $sl->get('listenerEventTask-ex04-evm-jbig3tryings');

        $exampleListener->setListenerEventTask($listenerEventTask);

        return $exampleListener;
    }
}