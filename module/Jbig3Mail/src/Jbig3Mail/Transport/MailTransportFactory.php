<?php
namespace Jbig3Mail\Transport;

use Zend\Debug\Debug;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Jbig3Mail\Transport\MailTransport;

class MailTransportFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $mailTransportConfigObj = $sm->get('mailTransportConfigObj');
        $zendMailFileTransportObj = $sm->get('zendMailFileTransportObj');
        $zendMailSendmailTransportObj = $sm->get('zendMailSendmailTransportObj');
        $zendMailSmtpTransportObj = $sm->get('zendMailSmtpTransportObj');

        $srv =  new MailTransport(
            $mailTransportConfigObj,
            $zendMailSendmailTransportObj,
            $zendMailSmtpTransportObj,
            $zendMailFileTransportObj
        );

        return $srv;
    }


}