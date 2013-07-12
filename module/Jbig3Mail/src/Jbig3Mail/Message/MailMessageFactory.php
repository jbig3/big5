<?php
namespace Jbig3Mail\Message;

use Zend\Debug\Debug;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Jbig3Mail\Message\MailMessage as MailMessageObj;

class MailMessageFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $mailMessageConfigObj = $sm->get('mailMessageConfigObj');
        $mailMessageHelperObj = $sm->get('mailMessageHelperObj');
        $zendMimeMessageObj = $sm->get('zendMimeMessageObj');


        $srv =  new MailMessageobj(
            $mailMessageConfigObj,
            $mailMessageHelperObj,
            $zendMimeMessageObj);

        return $srv;
    }


}