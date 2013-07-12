<?php

namespace Jbig3Tryings\EventManager\Example04\Listener;

use Zend\EventManager\EventInterface,
    Zend\EventManager\EventManagerInterface,
    Zend\EventManager\ListenerAggregateInterface;
use Jbig3Tryings\EventManager\Example04\Task\ListenerEventTask;

class ExampleListener implements ListenerAggregateInterface
{
    protected $listeners = array();
    protected $listenerEventTask;

    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach(
            'früh', array($this->listenerEventTask, 'frueh'), 300
        );

        $this->listeners[] = $events->attach(
            'mittag', array($this->listenerEventTask, 'mittag'), 300
        );

        $this->listeners[] = $events->attach(
            'spät', array($this->listenerEventTask, 'spaet'), 300
        );

    }
    public function detach(EventManagerInterface $events)
    {
        foreach($this->listeners as $index => $listener){
            if($events->detach($listener)){
                unset($this->listeners[$index]);
            }
        }
    }

    public function setListenerEventTask(ListenerEventTask $listenerEventTask){
        $this->listenerEventTask = $listenerEventTask;
    }



}