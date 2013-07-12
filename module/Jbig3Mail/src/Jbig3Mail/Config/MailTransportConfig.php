<?php

namespace Jbig3Mail\Config;

use Zend\Debug\Debug;

use Jbig3Mail\Config\MailConfig;

class MailTransportConfig extends MailConfig
{

    protected $transportMethod;

    public function getTransportMethod()
    {
        if ($this->transportMethod == '') {
            $this->setTransportMethod($this->config['transport']['transportMethod']);
        }
        return $this->transportMethod;
    }

    public function setTransportMethod($transportMethod)
    {
        $this->transportMethod = $transportMethod;
    }


}