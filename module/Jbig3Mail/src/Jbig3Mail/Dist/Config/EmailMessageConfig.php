<?php

namespace Jbig3Mail\Config;

use Zend\Debug\Debug;
use Jbig3Mail\Config\EmailConfig;

class EmailMessageConfig extends EmailConfig
{
    protected $encoding;
    protected $from;
    protected $fromName;
    protected $replyTo;
    protected $replyName;


    public function getEncoding()
    {
        if ($this->encoding == '') {
            $this->setEncoding($this->config['defaults']['encoding']);
        }
        return $this->encoding;
    }

    public function setEncoding($encoding)
    {
        $this->encoding = $encoding;
    }

    public function getFrom()
    {
        if ($this->from == '') {
            $this->setFrom($this->config["defaults"]["from_email"]);
        }
        return $this->from;
    }

    public function setFrom($from)
    {
        $this->from = $from;
    }

    public function getFromName()
    {
        if ($this->fromName == '') {
            $this->setFromName($this->config["defaults"]["from_name"]);
        }
        return $this->fromName;
    }

    public function setFromName($fromName)
    {
        $this->fromName = $fromName;
    }

    public function getReplyTo()
    {
        if (!$this->replyTo) {
            $this->setReplyTo($this->config["defaults"]["reply_to"]);
        }
        return $this->replyTo;
    }

    public function setReplyTo($replyTo)
    {
        $this->replyTo = $replyTo;
    }

    public function getReplyName()
    {
        if (!$this->replyName) {
            $this->setReplyName($this->config["defaults"]["reply_to_name"]);
        }
        return $this->replyName;
    }

    public function setReplyName($replyName)
    {
        $this->replyName = $replyName;
    }
}