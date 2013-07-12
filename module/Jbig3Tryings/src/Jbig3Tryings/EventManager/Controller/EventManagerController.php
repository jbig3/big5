<?php

namespace Jbig3Tryings\EventManager\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;
use Jbig3Tryings\EventManager\Controller\TriggerInterface;

class EventManagerController extends AbstractActionController
{
    protected $trigger;

    public function indexAction()
    {
        return new ViewModel(
            array(
                'greeting' => $this->trigger->getGreeting()
            )
        );
    }

    public function setTrigger(TriggerInterface $trigger)
    {
        $this->trigger = $trigger;
    }
}