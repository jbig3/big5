<?php
namespace Jbig3Mail\Address;

use Zend\Debug\Debug;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Jbig3Mail\Address\MailAddress;

class MailAddressFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $mailAddressConfigObj = $sm->get('mailAddressConfigObj');

        $srv =  new MailAddress($mailAddressConfigObj);

        return $srv;
    }


}