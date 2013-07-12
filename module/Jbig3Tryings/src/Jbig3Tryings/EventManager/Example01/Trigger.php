<?php
namespace Jbig3Tryings\EventManager\Example01;

use Zend\EventManager\EventManagerInterface;
use Jbig3Tryings\EventManager\Controller\TriggerInterface;

class Trigger implements TriggerInterface
{
    private $eventManager;

    public function getGreeting()
    {
//        $this->eventManager->trigger('getGreeting');
        $this->getEventManager()->trigger('getGreeting');

        if (date("H") <= 11)
            return "Guten Morgen die Herren.";
        else if (date("H") > 11 && date("H") < 17)
            return "Schönen Nachmittag gewünscht";
        else
            return "Guten Abend die Herren.";
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