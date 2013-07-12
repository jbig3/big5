<?php

namespace Jbig3Mail\Content;

use Zend\Debug\Debug;

use Zend\Mail\Message as ZendMailMessageObj,
    Zend\Mime\Message as ZendMimeMessageObj,
    Zend\View\Model\ViewModel as ZendViewModelObj,
    Zend\View\Renderer\PhpRenderer as ZendPhpRendererObj,
    Zend\Mime\Part as MimePartObj;

use Jbig3Mail\MailSend as MailSendObj,
    Jbig3Mail\Config\MailContentConfig as MailContentConfigObj,
    Jbig3Base\View\TemplatePathStack as TemplatePathStackObj;

class MailContent extends MailSendObj
{
    const TXT_TYPE = 'txt';
    const HTML_TYPE = 'html';
    const MULTI_TYPE = 'multi';

//    const PART_TXT_TYPE = 'text/plain';
//    const PART_HTML_TYPE = 'text/html';
//    const FOLDER_SUBJECT = 'subject';
//    const FOLDER_TEMPLATE_TXT = 'txt';
//    const FOLDER_TEMPLATE_HTML = 'html';
//    const FOLDER_LAYOUT_TXT = 'layout/txt';
//    const FOLDER_LAYOUT_HTML = 'layout/html';

    const CONTENT_VAR = 'content';


    protected $mailContentConfigObj;
    protected $templatePathStackObj;

    protected $zendPhpRendererObj;
    protected $zendViewModelObj;
//    protected $zendMimeMessageObj;
//    protected $zendTextPartObj;
//    protected $zendHtmlPartObj;


    public function __construct(
        MailContentConfigObj $mailContentConfigObj,
        ZendPhpRendererObj $zendPhpRendererObj,
        ZendViewModelObj $zendViewModelObj,
        ZendMimeMessageObj $zendMimeMessageObj,
        TemplatePathStackObj $templatePathStackObj)
    {
        $this->mailContentConfigObj = $mailContentConfigObj;
        $this->zendPhpRendererObj = $zendPhpRendererObj;
        $this->zendViewModelObj = $zendViewModelObj;
        $this->zendMimeMessageObj = $zendMimeMessageObj;
        $this->templatePathStackObj = $templatePathStackObj;

        $this->addTemplatePathStack();

        $this->setSubject();
        $this->setType();
        $this->setBody();
    }

//    public function setSubject($subject = null)
//    {
//        $template = $subject;
//
//        if ($subject == null) {
//            $template = $this->mailContentConfigObj->getTemplateName();
//        }
//        $templateVars = $this->mailContentConfigObj->getTemplateVars();
//        $subjectView = $this->createView(self::FOLDER_SUBJECT, $template, null, $templateVars);
//
//        $subject = $this->zendPhpRendererObj->render($subjectView);
//
////        parent::setSubject($subject);
//        return $this;
//    }

//    public function setType($type = null)
//    {
//        if ($type == null) {
//            $type = $this->mailContentConfigObj->getMimeType();
//        }
//        switch ($type) {
//            case self::TXT_TYPE:
//                $this->zendTextPartObj = $this->setZendTextPartObj();
//                break;
//            case self::HTML_TYPE:
//                $this->zendHtmlPartObj = $this->setZendHtmlPartObj();
//                break;
//            case self::MULTI_TYPE:
//                $this->zendTextPartObj = $this->setZendTextPartObj();
//                $this->zendHtmlPartObj = $this->setZendHtmlPartObj();
//        }
//        return $this;
//    }

//    public function setZendTextPartObj()
//    {
//        $template = $this->mailContentConfigObj->getTemplateName();
//        $templateVars = $this->mailContentConfigObj->getTemplateVars();
//        $textContent = $this->createView(self::FOLDER_TEMPLATE_TXT, $template, null, $templateVars);
//
//        $layout = $this->mailContentConfigObj->getLayoutName();
//        $templateVar = array(self::CONTENT_VAR => $this->zendPhpRendererObj->render($textContent));
//        $textLayout = $this->createView(self::FOLDER_LAYOUT_TXT, $layout, $templateVar);
//
//        $textPartObj = new MimePartObj($this->zendPhpRendererObj->render($textLayout));
//        $textPartObj->type = self::PART_TXT_TYPE;
//
//        return $textPartObj;
//    }

    public function setZendHtmlPartObj()
    {
        // TODO: Refactor mit setTxtPart
        $template = $this->mailContentConfigObj->getTemplateName();
        $templateVars = $this->mailContentConfigObj->getTemplateVars();
        $htmlContent = $this->createView(self::FOLDER_TEMPLATE_HTML, $template, null, $templateVars);

        $layout = $this->mailContentConfigObj->getLayoutName();
        $templateVar = array(self::CONTENT_VAR => $this->zendPhpRendererObj->render($htmlContent));
        $htmlLayout = $this->createView(self::FOLDER_LAYOUT_HTML, $layout, $templateVar);

        $htmlPart = new MimePartObj($this->zendPhpRendererObj->render($htmlLayout));
        $htmlPart->type = self::PART_HTML_TYPE;

        return $htmlPart;
    }

//    public function setBody($body = null)
//    {
//        if ($this->zendTextPartObj && !$this->zendHtmlPartObj) {
//            $this->zendMimeMessageObj->setParts(array($this->zendTextPartObj));
//        }
//        if (!$this->zendTextPartObj && $this->zendHtmlPartObj) {
//            $this->zendMimeMessageObj->setParts(array($this->zendHtmlPartObj));
//        }
//        if ($this->zendTextPartObj && $this->zendHtmlPartObj) {
//            $this->zendMimeMessageObj->setParts(array($this->zendTextPartObj, $this->zendHtmlPartObj));
//
//            //TODO: mit Objekt aus Controller vergleichen
////            Debug::dump($this->getHeaders()->get('content-type'));
//            // vielleicht muss auch erst der Body gesetzt werden
////            $this->zendMailMessageObj->getHeaders()->get('content-type')->setType('multipart/alternative');
//        }
//
////        parent::setBody($this->zendMimeMessageObj);
//        return $this;
//    }

//    private function createView($folder, $template, $templateVar = null, $templateVars = null)
//    {
//        $this->zendViewModelObj->setTemplate("/" . $folder . "/" . $template);
//
//        if ($templateVar != null) {
//            foreach ($templateVar as $key => $value) {
//                $this->zendViewModelObj->setVariable($key, $value);
//            }
//        }
//        if ($templateVars != null) {
//            $this->zendViewModelObj->setVariables($templateVars);
//        }
//
//        return $this->zendViewModelObj;
//    }

//    private function addTemplatePathStack(array $path = null)
//    {
//        if (!$path) {
//            $path = $this->mailContentConfigObj->getTemplatePathStack();
//        }
//
//        $this->templatePathStackObj->addTemplatePathStack($path);
//        return $this;
//    }
}