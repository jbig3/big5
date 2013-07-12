<?php

namespace Jbig3Mail\Transport;

use Zend\Debug\Debug;

use Zend\Mail\Transport\Sendmail as ZendSendMailTransportObj,
    Zend\Mail\Transport\Smtp as ZendSmtpMailTransportObj,
    Zend\Mail\Transport\File as ZendFileMailTransportObj;

use Jbig3Mail\Config\MailTransportConfig as MailTransportConfigObj,
    Jbig3Mail\Content\MailContent as MailContentObj;

class MailTransport
{
    const TRANSPORT_SENDMAIL = 'sendmail';
    const TRANSPORT_SMTP = 'smtp';
    const TRANSPORT_FILE = 'file';

    protected $mailTransportConfigObj;

    protected $zendFileTransportObj;
    protected $zendSendmailTransportObj;
    protected $zendSmtpTransportObj;

    public function __construct(
        MailTransportConfigObj $mailTransportConfigObj,
        ZendSendMailTransportObj $zendSendmailTransportObj,
        ZendSmtpMailTransportObj $zendSmtpTransportObj,
        ZendFileMailTransportObj $zendFileTransportObj)
    {
        $this->mailTransportConfigObj = $mailTransportConfigObj;
        $this->zendSendmailTransportObj = $zendSendmailTransportObj;
        $this->zendSmtpTransportObj = $zendSmtpTransportObj;
        $this->fileTransportObj = $zendFileTransportObj;
    }

    public function send($mailMessage, $transportMethod = null)
    {
        if($transportMethod == null){
            $transportMethod = $this->mailTransportConfigObj->getTransportMethod();
        }

        $transportObj =  $this->chooseTransportMethod($transportMethod);
        $transportObj->send($mailMessage);

    }

    public function chooseTransportMethod($transportMethod)
    {
        switch ($transportMethod) {
            case self::TRANSPORT_SENDMAIL:
                return $this->zendSendmailTransportObj;
            case self::TRANSPORT_SMTP:
                return $this->zendSmtpTransportObj;
            case self::TRANSPORT_FILE:
                return $this->fileTransportObj;
        }
    }
}