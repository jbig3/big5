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
namespace Jbig3Tryings\EventManager\Example03\Model;

/**
 * Pizza order model
 * 
 * @package    Pizza
 */
class Order
{
    public $id       = null;
    public $customer = null;
    public $items    = null;
}