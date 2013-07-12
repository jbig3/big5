<?php

namespace Jbig3Mail\Config;

use Zend\Debug\Debug;

class EmailConfig
{
    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
    }
}