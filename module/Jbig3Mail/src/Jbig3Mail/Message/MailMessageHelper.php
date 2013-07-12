<?php

namespace Jbig3Mail\Message;

use Zend\Debug\Debug;

use Zend\View\Model\ViewModel as ZendViewModelObj,
    Zend\View\Renderer\PhpRenderer as ZendPhpRendererObj,
    Zend\Mime\Part as MimePartObj;

use Jbig3Mail\Config\MailMessageConfig as MailMessageConfigObj,
    Jbig3Base\View\TemplatePathStack as TemplatePathStackObj;

class MailMessageHelper
{
    protected $mailMessageConfigObj;
    protected $templatePathStackObj;
    protected $zendViewModelObj;
    protected $zendPhpRendererObj;

    protected $mimeType;
    protected $subjectView;
    protected $htmlContentView;
    protected $htmlLayoutView;

    public function __construct(
        MailMessageConfigObj $mailMessageConfigObj,
        TemplatePathStackObj $templatePathStackObj,
        ZendViewModelObj $zendViewModelObj,
        ZendPhpRendererObj $zendPhpRendererObj)
    {
        $this->mailMessageConfigObj = $mailMessageConfigObj;
        $this->templatePathStackObj = $templatePathStackObj;
        $this->zendViewModelObj = $zendViewModelObj;
        $this->zendPhpRendererObj = $zendPhpRendererObj;

        $this->addTemplatePathStack();
    }

    private function addTemplatePathStack(array $path = null)
    {
        if (!$path) {
            $path = $this->mailMessageConfigObj->getTemplatePathStack();
        }

        $this->templatePathStackObj->addTemplatePathStack($path);
        return $this;
    }

    public function cloneSubjectView()
    {
        $this->subjectView = clone $this->zendViewModelObj;
        return $this->subjectView;
    }

    public function cloneHtmlContentView()
    {
        $this->htmlContentView = clone $this->zendViewModelObj;
        return $this->htmlContentView;
    }

    public function cloneHtmlLayoutView()
    {
        $this->htmlLayoutView = clone $this->zendViewModelObj;
        return $this->htmlLayoutView;
    }


    public function setTemplateVar($templateVar)
    {
        foreach ($templateVar as $key => $value) {
            $this->zendViewModelObj->setVariable($key, $value);
        }
    }

    public function render($content)
    {
        $content = $this->zendPhpRendererObj->render($content);
        return $content;
    }

    public function getMimeType()
    {
        if ($this->mimeType == null) {
            $this->setMimeType();
        }
        return $this->mimeType;
    }

    public function setMimeType($mimeType = null)
    {
        if ($mimeType == null) {
            $this->mimeType = $this->mailMessageConfigObj->getMimeType();
        } else {
            $this->mimeType = $mimeType;
        }
    }


    public function createMimePartObj($layout)
    {
        $mimePartObj = new MimePartObj($layout);
        return $mimePartObj;
    }
}