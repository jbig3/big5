<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Gregory
 * Date: 19.06.13
 * Time: 13:05
 * To change this template use File | Settings | File Templates.
 */

namespace Jbig3Tryings\EventManager\Task;

class LoggingTask
{
    public function onGetGreeting()
    {
        // Logging-Implementierung
        echo 'Infos aus dem LoggingTask per EventManager';
    }
}