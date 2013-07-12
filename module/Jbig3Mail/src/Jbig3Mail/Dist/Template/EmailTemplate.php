<?php

namespace Jbig3Mail\Template;

use Zend\View\Model\ViewModel as ViewModelObj,
    Zend\View\Renderer\PhpRenderer as PhpRendererObj,
    Zend\View\Resolver\AggregateResolver as AggregateResolverObj,
    Zend\View\Resolver\TemplatePathStack as TemplatePathStackObj,
    Zend\Mime\Part as MimePartObj;

use Jbig3Mail\Config\EmailTemplateConfig;

class EmailTemplate
{
    const TXT_TYPE = 'txt';
    const HTML_TYPE = 'html';
    const MULTI_TYPE = 'multi';

    const PART_TXT_TYPE = 'text/plain';
    const PART_HTML_TYPE = 'text/html';

    const FOLDER_FOLDER_SUBJECT = 'subject';
    const FOLDER_TEMPLATE_TXT = 'txt';
    const FOLDER_TEMPLATE_HTML = 'html';
    const FOLDER_LAYOUT_TXT = 'layout/txt';
    const FOLDER_LAYOUT_HTML = 'layout/html';

    const CONTENT_VAR = 'content';

    protected $mailTemplateConfigObj;

    protected $templatePathStackObj;
    protected $aggregateResolverObj;
    protected $viewModelObj;
    protected $phpRendererObj;


    public function setMailTemplateConfigObj(EmailTemplateConfig $mailTemplateConfigObj)
    {
        $this->mailTemplateConfigObj = $mailTemplateConfigObj;
    }

    public function setTemplatePathStackObj(TemplatePathStackObj $templatePathStackObj)
    {
        $this->templatePathStackObj = $templatePathStackObj;
    }

    public function setAggregateResolverObj(AggregateResolverObj $aggregateResolverObj)
    {
        $this->aggregateResolverObj = $aggregateResolverObj;
    }

    public function setViewModelObj(ViewModelObj $viewModelObj)
    {
        $this->viewModelObj = $viewModelObj;
    }

    public function setPhpRendererObj(PhpRendererObj $phpRendererObj)
    {
        $this->phpRendererObj = $phpRendererObj;
    }

    public function setType($type = null)
    {
        if ($type == null) {
            $type = $this->mailTemplateConfigObj->getType();
        }
        switch ($type) {
            case self::TXT_TYPE:
                $this->textPart = $this->setTextPart();
                break;
            case self::HTML_TYPE:
                $this->htmlPart = $this->setHtmlPart();
                break;
            case self::MULTI_TYPE:
                $this->textPart = $this->setTextPart();
                $this->htmlPart = $this->setHtmlPart();
        }
        return $this;
    }

    public function setSubject($subject = null)
    {
        $template = $subject;

        if ($subject == null) {
            $template = $this->mailTemplateConfigObj->getTemplateName();
        }
        $templateVars = $this->mailTemplateConfigObj->getTemplateVars();
        $subjectView = $this->createView(self::FOLDER_FOLDER_SUBJECT, $template, null, $templateVars);

        $subject = $this->phpRendererObj->render($subjectView);

        return $subject;
    }

    public function setTextPart()
    {
        $template = $this->mailTemplateConfigObj->getTemplateName();
        $templateVars = $this->mailTemplateConfigObj->getTemplateVars();
        $textContent = $this->createView(self::FOLDER_TEMPLATE_TXT, $template, null, $templateVars);

        $layout = $this->mailTemplateConfigObj->getLayoutName();
        $templateVar = array(self::CONTENT_VAR => $this->phpRendererObj->render($textContent));
        $textLayout = $this->createView(self::FOLDER_LAYOUT_TXT, $layout, $templateVar);

        $textPart = new MimePartObj($this->phpRendererObj->render($textLayout));
        $textPart->type = self::PART_TXT_TYPE;

        return $textPart;
    }

    public function setHtmlPart()
    {
        // TODO: Refactor mit setTxtPart
        $template = $this->mailTemplateConfigObj->getTemplateName();
        $templateVars = $this->mailTemplateConfigObj->getTemplateVars();
        $htmlContent = $this->createView(self::FOLDER_TEMPLATE_HTML, $template, null, $templateVars);

        $layout = $this->mailTemplateConfigObj->getLayoutName();
        $templateVar = array(self::CONTENT_VAR => $this->phpRendererObj->render($htmlContent));
        $htmlLayout = $this->createView(self::FOLDER_LAYOUT_HTML, $layout, $templateVar);

        $htmlPart = new MimePartObj($this->phpRendererObj->render($htmlLayout));
        $htmlPart->type = self::PART_HTML_TYPE;

        return $htmlPart;
    }


    public function createView($folder, $template, $templateVar = null, $templateVars = null)
    {
        $this->preparePhpRenderer();

        $this->viewModelObj->setTemplate("/" . $folder . "/" . $template);

        if ($templateVar != null) {
            foreach ($templateVar as $key => $value) {
                $this->viewModelObj->setVariable($key, $value);
            }
        }
        if ($templateVars != null) {
            $this->viewModelObj->setVariables($templateVars);
        }

        return $this->viewModelObj;
    }

    public function preparePhpRenderer()
    {
        foreach ($this->mailTemplateConfigObj->getTemplatePathStack() as $path) {
            $this->templatePathStackObj->addPath($path);
        }
        $this->aggregateResolverObj->attach($this->templatePathStackObj);
        $this->phpRendererObj->setResolver($this->aggregateResolverObj);
    }
}