<?php

namespace Jbig3Mail\Config;

use Zend\Debug\Debug;

use Jbig3Mail\Config\EmailConfig;

class MailContentConfig extends EmailConfig
{
//    protected $templatePathStack;
//    protected $mimeType;
//    protected $templateName;
//    protected $layoutName;
//    protected $templateVars = array();


//    public function getTemplatePathStack()
//    {
//        if (!$this->templatePathStack) {
//            $this->setTemplatePathStack($this->config['content']['template_path_stack']);
//        }
//        return $this->templatePathStack;
//    }
//
//    public function setTemplatePathStack($templatePathStack)
//    {
//        $this->templatePathStack = $templatePathStack;
//    }

//    public function getMimeType()
//    {
//        if ($this->mimeType == '') {
//            $this->setMimeType($this->config['content']['mimeType']);
//        }
//        return $this->mimeType;
//    }
//
//    public function setMimeType($mimeType)
//    {
//        $this->mimeType = $mimeType;
//    }

//    public function getTemplateName()
//    {
//        if (!$this->templateName) {
//            $this->setTemplateName($this->config['content']["template_name"]);
//        }
//        return $this->templateName;
//    }
//
//    public function setTemplateName($templateName)
//    {
//        $this->templateName = $templateName;
//    }

    public function getLayoutName()
    {
        if ($this->layoutName == '') {
            $this->setLayoutName($this->config['content']['layout_name']);
        }
        return $this->layoutName;
    }

    public function setLayoutName($layoutName)
    {
        $this->layoutName = $layoutName;
    }

    // TODO: hier scheint noch ein Fehler zu liegen / Objekt anscheuen
    // das This bringt mir auch aus diesem Objekt nichts mehr / ich brauch die Address
    public function getTemplateVars()
    {
        if (!$this->templateVars) {
            $this->addTemplateVars(array_merge($this->config['content']["template_vars"], $this->toArray()));
        }
        return $this->templateVars;
    }

    public function setTemplateVars($templateVars)
    {
        unset($this->templateVars);
        $this->templateVars[] = $templateVars;
    }

    public function addTemplateVars($templateVars)
    {
        $this->templateVars[] = $templateVars;
    }

    // TODO: kann mit einfacher PHP-Funktion aufgelöst werden
    public function toArray()
    {
        $values = array();
        // könnten dann hier auch andere Objekte hinzufegügt werden
        foreach (get_object_vars($this) as $key => $val) {
            $values[$key] = $val;
        }
        return $values;
    }



}