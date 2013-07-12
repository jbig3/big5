<?php
namespace Jbig3Mail\Config;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface,
    Zend\Debug\Debug;

use Jbig3Mail\Config\EmailMessageConfig;

class EmailMessageConfigFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $config = $sm->get('Config');

        $srv =  new EmailMessageConfig($config["email"]);

        return $srv;
    }


}