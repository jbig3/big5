<?php
namespace Jbig3Mail\Message;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface,
    Zend\Debug\Debug;

use Jbig3Mail\Message\EmailMessage;

class EmailMessageFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $zendMailMessageObj = $sm->get('zendMailMessageObj');
        $ZendMimeMessageObj = $sm->get('zendMimeMessageObj');

        $mailMessageConfigObj = $sm->get('mailMessageConfigObj');
        $mailTemplateObj = $sm->get('mailTemplateObj');
        $mailTransportObj = $sm->get('mailTransportObj');

        $srv =  new EmailMessage();

        $srv->setZendMailMessageObj($zendMailMessageObj);
        $srv->setZendMimeMessageObj($ZendMimeMessageObj);
        $srv->setMailMessageConfigObj($mailMessageConfigObj);
        $srv->setMailTemplateObj($mailTemplateObj);
        $srv->setMailTransportObj($mailTransportObj);

        return $srv;
    }


}