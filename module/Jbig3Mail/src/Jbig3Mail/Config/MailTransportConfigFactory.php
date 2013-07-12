<?php
namespace Jbig3Mail\Config;

use Zend\Debug\Debug;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Jbig3Mail\Config\MailTransportConfig;

class MailTransportConfigFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $config = $sm->get('Config');

        $srv =  new MailTransportConfig($config["email"]);

        return $srv;
    }


}