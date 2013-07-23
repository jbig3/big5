<?php
/**
 * ZF2 Buch Kapitel 15
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
namespace Jbig3Base\View\Helper;

use DateTime;
use IntlDateFormatter;
use Zend\View\Helper\AbstractHelper;

/**
 * Date output
 * 
 * Simplifies the date output for the dateFormat view helper
 * 
 * @package    Application
 */
class Date extends AbstractHelper
{
    /**
     * get string date and output it
     * 
     * @param string $date
     * @param string $mode
     * @return boolean
     */
    public function __invoke($date, $mode = 'medium')
    {

        if(is_string($date)){
            if ($date == '0000-00-00 00:00:00') {
                return '-';
            }

            $dateTime = new DateTime($date);
        }

        if(is_object($date)){

            $dateTime = $date;
        }

        switch ($mode) {
            case 'long':
                $dateType = IntlDateFormatter::LONG;
                $timeType = IntlDateFormatter::LONG;
                break;

            case 'short':
                $dateType = IntlDateFormatter::SHORT;
                $timeType = IntlDateFormatter::SHORT;
                break;

            case 'dateonly':
                $dateType = IntlDateFormatter::MEDIUM;
                $timeType = IntlDateFormatter::NONE;
                break;

            case 'timeonly':
                $dateType = IntlDateFormatter::NONE;
                $timeType = IntlDateFormatter::SHORT;
                break;

            default:
            case 'medium':
                $dateType = IntlDateFormatter::MEDIUM;
                $timeType = IntlDateFormatter::MEDIUM;
                break;
        }

        return $this->getView()->dateFormat($dateTime, $dateType, $timeType);
    }
}
