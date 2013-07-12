<?php
namespace Jbig3Mail\Message;

use Zend\Debug\Debug;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Jbig3Mail\Message\MailMessageHelper as MailMessageHelperObj;

class MailMessageHelperFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $mailMessageConfigObj = $sm->get('mailMessageConfigObj');
        $templatePathStackObj = $sm->get('templatePathStack-jbig3base');
        $zendViewModelObj = $sm->get('zendViewModel-jbig3base');
        $zendPhpRendererObj = $sm->get('zendPhpRenderer-jbig3base');

        $srv =  new MailMessageHelperObj(
            $mailMessageConfigObj,
            $templatePathStackObj,
            $zendViewModelObj,
            $zendPhpRendererObj);

        return $srv;
    }


}