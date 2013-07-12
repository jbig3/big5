<?php

namespace Jbig3Tryings\EventManager\Example04\EventManager;

use Traversable;
use Zend\EventManager\EventManagerAwareInterface,
    Zend\EventManager\EventManagerInterface,
    Zend\EventManager\EventManager;

abstract class EventProvider implements EventManagerAwareInterface
{
    protected $events;
//    protected $eventIdentifier;

    public function setEventManager(EventManagerInterface $events)
    {
        $identifiers = array(__CLASS__, get_called_class());

        if(isset($this->eventIdentifier)){
            if(is_string($this->eventIdentifier)
                || (is_array($this->eventIdentifier))
                || ($this->eventIdentifier instanceof Traversable)){

                $identifiers = array_unique(array_merge($identifiers, (array) $this->eventIdentifier));
            } elseif(is_object($this->eventIdentifier)){
                $identifiers[] = $this->eventIdentifier;
            }
        }

        $events->setIdentifiers($identifiers);
        $this->events = $events;
        return $this;
    }

    public function getEventManager()
    {
        if (!$this->events instanceof EventManagerInterface) {
            $this->setEventManager(new EventManager());
        }
        return $this->events;
    }
}