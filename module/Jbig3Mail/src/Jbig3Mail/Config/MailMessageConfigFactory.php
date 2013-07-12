<?php
namespace Jbig3Mail\Config;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface,
    Zend\Debug\Debug;

use Jbig3Mail\Config\MailMessageConfig;

class MailMessageConfigFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $config = $sm->get('Config');

        $srv =  new MailMessageConfig($config["email"]);

        return $srv;
    }


}