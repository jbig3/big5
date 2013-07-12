<?php

namespace Jbig3Tryings\EventManager\Example04\Service;

use Zend\Debug\Debug;
use Jbig3Tryings\EventManager\Example04\EventManager\EventProvider;

class TriggerService extends EventProvider
{

    public function getGreeting()
    {
        if (date("H") <= 11){
            $this->getEventManager()->trigger('früh', __CLASS__);
        }else if (date("H") > 11 && date("H") < 17){
            $this->getEventManager()->trigger('mittag', __CLASS__);
        }else{
            $this->getEventManager()->trigger('spät', __CLASS__);
        }
    }
}