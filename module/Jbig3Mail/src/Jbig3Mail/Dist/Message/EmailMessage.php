<?php

namespace Jbig3Mail\Message;

use Zend\Mail\Message as ZendMailMessageObj,
    Zend\Mime\Message as ZendMimeMessageObj,
    Zend\Debug\Debug;

use Jbig3Mail\Config\EmailConfig as MailConfigObj,
    Jbig3Mail\Template\EmailTemplate as MailTemplateObj,
    Jbig3Mail\Transport\EmailTransport as MailTransportObj;

class EmailMessage
{
    protected $zendMailMessageObj;
    protected $zendMimeMessageObj;

    protected $mailMessageConfigObj;
    protected $mailTemplateObj;
    protected $mailTransportObj;

    public function setZendMailMessageObj(ZendMailMessageObj $zendMailMessageObj)
    {
        $this->zendMailMessageObj = $zendMailMessageObj;
    }

    public function setMailMessageConfigObj(MailConfigObj $mailConfigObj)
    {
        $this->mailMessageConfigObj = $mailConfigObj;
    }

    public function setMailTemplateObj(MailTemplateObj $mailTemplateObj)
    {
        $this->mailTemplateObj = $mailTemplateObj;
    }

    public function setZendMimeMessageObj(ZendMimeMessageObj $zendMimeMessageObj)
    {
        $this->zendMimeMessageObj = $zendMimeMessageObj;
    }

    public function setMailTransportObj(MailTransportObj $mailTransportObj)
    {
        $this->mailTransportObj = $mailTransportObj;
    }

    public function create()
    {
        $this->setEncoding();
        $this->setFrom();
        $this->setReplyTo();
        $this->setType();
        $this->setBody();

        return $this;
    }


    public function setEncoding($encoding = null)
    {
        if ($encoding == null) {
            $encoding = $this->mailMessageConfigObj->getEncoding();
        }

        $this->zendMailMessageObj->setEncoding($encoding);
        return $this;
    }

    public function setFrom($emailOrAddressList = null, $name = null)
    {
        if ($emailOrAddressList == null && $name == null) {
            $emailOrAddressList = $this->mailMessageConfigObj->getFrom();
            $name = $this->mailMessageConfigObj->getFromName();
        }

        $this->zendMailMessageObj->setFrom($emailOrAddressList, $name);
        return $this;
    }

    public function setReplyTo($emailOrAddressList = null, $name = null)
    {
        if ($emailOrAddressList == null && $name == null) {
            $emailOrAddressList = $this->mailMessageConfigObj->getReplyTo();
            $name = $this->mailMessageConfigObj->getReplyName();
        }

        $this->zendMailMessageObj->setReplyTo($emailOrAddressList, $name);
        return $this;
    }

    public function addReplyTo($emailOrAddressOrList, $name = null)
    {
        $this->zendMailMessageObj->addReplyTo($emailOrAddressOrList, $name);
        return $this;
    }

    public function setTo($emailOrAddressList, $name = null)
    {
        $this->zendMailMessageObj->setTo($emailOrAddressList, $name);
        return $this;
    }

    public function addTo($emailOrAddressOrList, $name = null)
    {
        $this->zendMailMessageObj->addTo($emailOrAddressOrList, $name);
        return $this;
    }

    public function setCc($emailOrAddressList, $name = null)
    {
        $this->zendMailMessageObj->setCc($emailOrAddressList, $name);
        return $this;
    }

    public function addCc($emailOrAddressOrList, $name = null)
    {
        $this->zendMailMessageObj->addCc($emailOrAddressOrList, $name);
        return $this;
    }

    public function setBcc($emailOrAddressList, $name = null)
    {
        $this->zendMailMessageObj->setBcc($emailOrAddressList, $name);
        return $this;
    }

    public function addBcc($emailOrAddressOrList, $name = null)
    {
        $this->zendMailMessageObj->addBcc($emailOrAddressOrList, $name);
        return $this;
    }

    public function setSubject($subject = null)
    {
        $subject = $this->mailTemplateObj->setSubject($subject);

        $this->zendMailMessageObj->setSubject($subject);
        return $this;

    }

    public function setType($type = null)
    {
        $this->mailTemplateObj->setType($type);
        return $this;
    }

    public function setBody($body = null)
    {
        $textPart = $this->mailTemplateObj->setTextPart();
        $htmlPart = $this->mailTemplateObj->setHtmlPart();

        if ($textPart && !$htmlPart) {
            $this->zendMimeMessageObj->setParts(array($textPart));
        }
        if (!$textPart && $htmlPart) {
            $this->zendMimeMessageObj->setParts(array($htmlPart));
        }
        if ($textPart && $htmlPart) {
            $this->zendMimeMessageObj->setParts(array($textPart, $htmlPart));

            //TODO: mit Objekt aus Controller vergleichen
//            Debug::dump($this->zendMailMessageObj->getHeaders()->get('content-type'));
//            $this->zendMailMessageObj->getHeaders()->get('content-type')->setType('multipart/alternative');
        }

        $this->zendMailMessageObj->setBody($this->zendMimeMessageObj);
        return $this;
    }

    public function send($method = null)
    {
        $transportObj = $this->mailTransportObj->send($method);
        $transportObj->send($this->zendMailMessageObj);
    }


}