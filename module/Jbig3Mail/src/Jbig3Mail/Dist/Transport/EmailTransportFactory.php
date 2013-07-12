<?php
namespace Jbig3Mail\Transport;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface,
    Zend\Debug\Debug;

use Jbig3Mail\Transport\EmailTransport;

class EmailTransportFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {

        $mailTransportConfigObj = $sm->get('mailTransportConfigObj');
        $fileTransportObj = $sm->get('zendMailFileTransportObj');
        $sendmailTransportObj = $sm->get('zendMailSendmailTransportObj');
        $smtpTransportObj = $sm->get('zendMailSmtpTransportObj');

        $srv =  new EmailTransport();

        $srv->setMailTransportConfigObj($mailTransportConfigObj);
        $srv->setFileTransportObj($fileTransportObj);
        $srv->setSendmailTransportObj($sendmailTransportObj);
        $srv->setSmtpTransportObj($smtpTransportObj);

        return $srv;
    }


}