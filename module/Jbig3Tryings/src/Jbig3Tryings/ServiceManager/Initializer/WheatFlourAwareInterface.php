<?php
/**
 * ZF2 Buch Kapitel 6
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
namespace Jbig3Tryings\ServiceManager\Initializer;

/**
 * Wheat-flour aware interface
 * 
 * @package    Pizza
 */
interface WheatFlourAwareInterface
{
    public function setWheatFlourCrust($crust);
    
    public function getWheatFlourCrust();
}

