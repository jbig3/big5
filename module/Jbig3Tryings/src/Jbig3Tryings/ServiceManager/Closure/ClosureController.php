<?php

namespace Jbig3Tryings\ServiceManager\Closure;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Jbig3Tryings\ServiceManager\Plugin\GreetingPlugin;

class ClosureController extends AbstractActionController
{
    protected $greetingService;

    public function indexAction()
    {
        return new ViewModel(
            array(
                'greeting' => $this->greetingService->getGreeting()
            )
        );
    }

    public function setGreetingService(GreetingPlugin $service)
    {
        $this->greetingService = $service;
    }
}