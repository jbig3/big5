<?php
namespace Jbig3Tryings\EventManager\Example02;

use Zend\EventManager\EventManagerInterface;
use Jbig3Tryings\EventManager\Controller\TriggerInterface;


class SharedTrigger implements TriggerInterface
{
    private $eventManager;

    public function getGreeting()
    {
        $this->eventManager->addIdentifiers('SharedTrigger');
        $this->eventManager->trigger('getGreeting');

        if (date("H") <= 11)
            return "Good morning, world!";
        else if (date("H") > 11 && date("H") < 17)
            return "Hello, world!";
        else
            return "Good evening, world!";
    }

    public function getEventManager()
    {
        return $this->eventManager;
    }

    public function setEventManager(EventManagerInterface $em)
    {
        $this->eventManager = $em;
    }
}