<?php

namespace Jbig3Tryings\ServiceManager\Initializer;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel,
    Zend\Debug\Debug,
    Zend\ServiceManager\ServiceManager;
use Jbig3Tryings\ServiceManager\Initializer\PizzaSalami;


class InitializerController extends AbstractActionController
{
    protected $pizzaSalami;

    public function indexAction()
    {
        Debug::dump($this->pizzaSalami);

        return new ViewModel(
            array()
        );
    }

    public function setPizzaSalami(PizzaSalami $pizzaSalami)
    {
        $this->pizzaSalami = $pizzaSalami;
    }

}