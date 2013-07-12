<?php
/**
 * ZF2 Buch Kapitel 5
 * 
 * Das Buch "Zend Framework 2 - Von den Grundlagen bis zur fertigen Anwendung"
 * von Ralf Eggert ist im Addison-Wesley Verlag erschienen. 
 * ISBN 978-3-8273-2994-3
 * 
 * @package    Application
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @copyright  Alle Listings sind urheberrechtlich geschützt!
 * @link       http://www.zendframeworkbuch.de/ und http://www.awl.de/2994
 */

/**
 * namespace definition and usage
 */
namespace Jbig3Tryings\EventManager\Example04\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel,
    Zend\Debug\Debug;

use Jbig3Tryings\EventManager\Example04\Service\TriggerService;

class Ex04Controller extends AbstractActionController
{
    protected $triggerService;

    public function indexAction()
    {
        return new ViewModel(
            array(
                'greeting' => $this->triggerService->getGreeting()
            )
        );
    }

    public function setTriggerService(TriggerService $triggerService)
    {
        $this->triggerService = $triggerService;
    }

}
