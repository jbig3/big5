<?php

namespace Jbig3Mail\Transport;

use Zend\Mail\Transport\Sendmail as SendMailTransportObj,
    Zend\Mail\Transport\Smtp as SmtpMailTransportObj,
    Zend\Mail\Transport\File as FileMailTransportObj;

use Jbig3Mail\Config\EmailTransportConfig;

class EmailTransport
{
    const TRANSPORT_SENDMAIL = 'sendmail';
    const TRANSPORT_SMTP = 'smtp';
    const TRANSPORT_FILE = 'file';

    protected $mailTransportConfigObj;
    protected $fileTransportObj;
    protected $sendmailTransportObj;
    protected $smtpTransportObj;


    public function setMailTransportConfigObj(EmailTransportConfig $mailTransportConfigObj)
    {
        $this->mailTransportConfigObj = $mailTransportConfigObj;
    }

    public function setFileTransportObj(FileMailTransportObj $fileTransportObj)
    {
        $this->fileTransportObj = $fileTransportObj;
    }

    public function setSendmailTransportObj(SendMailTransportObj $sendmailTransportObj)
    {
        $this->sendmailTransportObj = $sendmailTransportObj;
    }

    public function setSmtpTransportObj(SmtpMailTransportObj $smtpTransportObj)
    {
        $this->smtpTransportObj = $smtpTransportObj;
    }

//    // TODO: in Transport verschieben
//    public function send($method = null)
//    {
//        $transportObj = $this->mailTransportObj->send($method);
//        $transportObj->send($this->zendMailMessageObj);
//    }

    public function send($method = null)
    {
        if($method == null){
            $method = $this->mailTransportConfigObj->getTransportMethod();
        }

        return $this->chooseTransportMethod($method);
    }

    public function chooseTransportMethod($transportMethod)
    {
        switch ($transportMethod) {
            case self::TRANSPORT_SENDMAIL:
                return $this->sendmailTransportObj;
            case self::TRANSPORT_SMTP:
                return $this->smtpTransportObj;
            case self::TRANSPORT_FILE:
                return $this->fileTransportObj;
        }
    }
}