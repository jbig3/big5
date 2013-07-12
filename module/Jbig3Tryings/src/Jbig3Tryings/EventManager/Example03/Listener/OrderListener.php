<?php
/**
 * ZF2 Buch Kapitel 5
 * 
 * Das Buch "Zend Framework 2 - Von den Grundlagen bis zur fertigen Anwendung"
 * von Ralf Eggert ist im Addison-Wesley Verlag erschienen. 
 * ISBN 978-3-8273-2994-3
 * 
 * @package    Pizza
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @copyright  Alle Listings sind urheberrechtlich geschützt!
 * @link       http://www.zendframeworkbuch.de/ und http://www.awl.de/2994
 */

/**
 * namespace definition and usage
 */
namespace Jbig3Tryings\EventManager\Example03\Listener;

use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;

/**
 * Pizza order listener
 * 
 * @package    Pizza
 */
class OrderListener implements ListenerAggregateInterface
{
    protected $listeners = array();
    
    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach(
            'postOrder', array($this, 'sendConfirmation'), 300
        );
        $this->listeners[] = $events->attach(
            'postOrder', array($this, 'updateStock'), 100
        );
        $this->listeners[] = $events->attach(
            'postOrder', array($this, 'bakePizza'), 200
        );
        $this->listeners[] = $events->attach(
            'preOrder', array($this, 'checkStock'), 100
        );
    }
    
    public function detach(EventManagerInterface $events)
    {
        foreach ($this->listeners as $index => $listener) {
            if ($events->detach($listener)) {
                unset($this->listeners[$index]);
            }
        }
    }
    
    public function sendConfirmation(EventInterface $e)
    {
        echo "Send order confirmation<br />";
    }
    
    public function updateStock(EventInterface $e)
    {
        echo "Update stock<br />";
    }
    
    public function bakePizza(EventInterface $e)
    {
        echo "Bake the pizza<br />";
    }
    
    public function checkStock(EventInterface $e)
    {
        echo "Check stock<br />";
    }
}
