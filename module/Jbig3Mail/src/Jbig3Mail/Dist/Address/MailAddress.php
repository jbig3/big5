<?php

namespace Jbig3Mail\Address;

use Zend\Debug\Debug;

use Jbig3Mail\Config\MailAddressConfig as MailAddressConfigObj;

class MailAddress
{
    protected $mailAddressConfigObj;

    protected $encoding;
    protected $from;
    protected $fromName;
    protected $replyTo;
    protected $replyName;

    public function __construct(MailAddressConfigObj $mailAddressConfigObj)
    {
        $this->mailAddressConfigObj = $mailAddressConfigObj;
    }

    public function getEncoding()
    {
        if($this->encoding == null){
            $this->setEncoding();
        }
        return $this->encoding;
    }

    public function setEncoding($encoding = null)
    {
        if($encoding == null){
            $this->encoding = $this->mailAddressConfigObj->getEncoding();
        }else{
            $this->encoding = $encoding;
        }
    }

    public function getFrom()
    {
        if($this->from == null){
            $this->setFrom();
        }
        return $this->from;
    }

    public function setFrom($from = null)
    {
        if ($from == null) {
            $this->from = $this->mailAddressConfigObj->getFrom();
        }else{
            $this->from = $from;
        }
    }

    public function getFromName()
    {
        if($this->fromName == null){
            $this->setFromName();
        }
        return $this->fromName;
    }

    public function setFromName($name = null)
    {
        if($name == null){
            $this->fromName = $this->mailAddressConfigObj->getFromName();
        }else{
            $this->fromName = $name;
        }
    }

    public function getReplyTo()
    {
        if($this->replyTo == null){
            $this->setReplyTo();
        }
        return $this->replyTo;
    }

    public function setReplyTo($replyTo = null)
    {
        if ($replyTo == null) {
            $this->replyTo = $this->mailAddressConfigObj->getReplyTo();
        }else{
            $this->replyTo = $replyTo;
        }
    }

    public function getReplyName()
    {
        if($this->replyName == null){
            $this->setReplyName();
        }
        return $this->replyName;
    }

    public function setReplyName($name = null)
    {
        if ($name == null) {
            $this->replyName = $this->mailAddressConfigObj->getReplyName();
        }else{
            $this->replyName = $name;
        }
    }
}