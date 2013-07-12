<?php
namespace Jbig3Mail\Config;

use Zend\Debug\Debug;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;


use Jbig3Mail\Config\MailContentConfig;

class MailContentConfigFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $config = $sm->get('Config');

        $srv =  new MailContentConfig($config["email"]);

        return $srv;
    }


}