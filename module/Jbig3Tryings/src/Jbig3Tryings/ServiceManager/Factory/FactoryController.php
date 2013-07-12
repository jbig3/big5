<?php

namespace Jbig3Tryings\ServiceManager\Factory;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Jbig3Tryings\ServiceManager\Plugin\GreetingPlugin;

class FactoryController extends AbstractActionController
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