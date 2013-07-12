<?php

namespace Jbig3Mail;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface,
    Zend\ModuleManager\Feature\ConfigProviderInterface,
    Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements
    AutoloaderProviderInterface,
    ConfigProviderInterface,
    ServiceProviderInterface
{

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'invokables' => array(
                'zendMailMessageObj' => 'Zend\Mail\Message',
                'zendMimeMessageObj' => 'Zend\Mime\Message',
                'zendMimePartObj' => 'Zend\Mime\Part',
                'zendMailFileTransportObj' => 'Zend\Mail\Transport\File',
                'zendMailSendmailTransportObj' => 'Zend\Mail\Transport\Sendmail',
                'zendMailSmtpTransportObj' => 'Zend\Mail\Transport\Smtp',
            ),
            'factories' => array(
                'mailMessageObj' => 'Jbig3Mail\Message\MailMessageFactory',
                'mailMessageHelperObj' => 'Jbig3Mail\Message\MailMessageHelperFactory',
//                'mailAddressObj' => 'Jbig3Mail\Address\MailAddressFactory',
//                'mailContentObj' => 'Jbig3Mail\Content\MailContentFactory',
                'mailTransportObj' => 'Jbig3Mail\Transport\MailTransportFactory',
                'mailMessageConfigObj' => 'Jbig3Mail\Config\MailMessageConfigFactory',
//                'mailAddressConfigObj' => 'Jbig3Mail\Config\MailAddressConfigFactory',
//                'mailContentConfigObj' => 'Jbig3Mail\Config\MailContentConfigFactory',
                'mailTransportConfigObj' => 'Jbig3Mail\Config\MailTransportConfigFactory',
            )
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}