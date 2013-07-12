<?php

namespace Jbig3Mail\Config;

use Zend\Debug\Debug;
use Jbig3Mail\Config\EmailConfig;

class EmailTemplateConfig extends EmailConfig
{
    protected $templatePathStack;
    protected $type;
    protected $templateName;
    protected $layoutName;
    protected $templateVars = array();


    public function getTemplatePathStack()
    {
        if (!$this->templatePathStack) {
            $this->setTemplatePathStack($this->config['template_path_stack']);
        }
        return $this->templatePathStack;
    }

    public function setTemplatePathStack($templatePathStack)
    {
        $this->templatePathStack = $templatePathStack;
    }

    public function getType()
    {
        if ($this->type == '') {
            $this->setType($this->config['defaults']['type']);
        }
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getTemplateName()
    {
        if (!$this->templateName) {
            $this->setTemplateName($this->config['template']["template_name"]);
        }
        return $this->templateName;
    }

    public function setTemplateName($templateName)
    {
        $this->templateName = $templateName;
    }

    public function getLayoutName()
    {
        if ($this->layoutName == '') {
            $this->setLayoutName($this->config['template']['layout_name']);
        }
        return $this->layoutName;
    }

    public function setLayoutName($layoutName)
    {
        $this->layoutName = $layoutName;
    }

    // TODO: hier scheint noch ein Fehler zu liegen
    public function getTemplateVars()
    {
        if (!$this->templateVars) {
            $this->addTemplateVars(array_merge($this->config["template_vars"], $this->toArray()));
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
        foreach (get_object_vars($this) as $key => $val) {
            $values[$key] = $val;
        }
        return $values;
    }



}