<?php
namespace Jbig3Mail\Content;

use Zend\Debug\Debug;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;


use Jbig3Mail\Content\MailContent;

class MailContentFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $mailContentConfigObj = $sm->get('mailContentConfigObj');

        $templatePathStackObj = $sm->get('templatePathStack-jbig3base');
        $zendViewModelObj = $sm->get('zendViewModel-jbig3base');
        $zendPhpRendererObj = $sm->get('zendPhpRenderer-jbig3base');
        $zendMimeMessageObj = $sm->get('zendMimeMessageObj');

        $srv =  new MailContent(
            $mailContentConfigObj,
            $zendPhpRendererObj,
            $zendViewModelObj,
            $zendMimeMessageObj,
            $templatePathStackObj
        );

        return $srv;
    }


}