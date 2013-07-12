<?php

namespace Jbig3Mail\Config;

use Zend\Debug\Debug;
use Jbig3Mail\Config\EmailConfig;

class EmailTransportConfig extends EmailConfig
{

    protected $transportMethod;

    public function getTransportMethod()
    {
        if ($this->transportMethod == '') {
            $this->setTransportMethod($this->config['defaults']['transportMethod']);
        }
        return $this->transportMethod;
    }

    public function setTransportMethod($transportMethod)
    {
        $this->transportMethod = $transportMethod;
    }


}