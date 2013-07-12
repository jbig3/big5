<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Gregory
 * Date: 19.06.13
 * Time: 13:05
 * To change this template use File | Settings | File Templates.
 */

namespace Jbig3Tryings\EventManager\Example04\Task;

use Zend\EventManager\EventInterface;

class ListenerEventTask
{
    public function frueh(EventInterface $e)
    {
        echo "Ist früh<br />";
    }

    public function mittag(EventInterface $e)
    {
        echo "Ist Mittag<br />";
    }

    public function spaet(EventInterface $e)
    {
        echo "Ist Spät<br />";
    }
}