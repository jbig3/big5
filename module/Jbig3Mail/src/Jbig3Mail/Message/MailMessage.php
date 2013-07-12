<?php

namespace Jbig3Mail\Message;

use Zend\Debug\Debug;

use Zend\Mail\Message as ZendMailMessage,
    Zend\Mime\Message as ZendMimeMessageObj;

use Jbig3Mail\Config\MailMessageConfig as MailMessageConfigObj,
    Jbig3Mail\Message\MailMessageHelper as MailMessageHelperObj;


class MailMessage extends ZendMailMessage
{
    const TXT_TYPE = 'txt';
    const HTML_TYPE = 'html';
    const MULTI_TYPE = 'multi';

    const MIME_PART_TXT_TYPE = 'text/plain';
    const MIME_PART_HTML_TYPE = 'text/html';

    protected $mailMessageConfigObj;
    protected $mailMessageHelperObj;
    protected $zendMimeMessageObj;

    protected $templateVars;

    public function __construct(
        MailMessageConfigObj $mailMessageConfigObj,
        MailMessageHelperObj $mailMessageHelperObj,
        ZendMimeMessageObj $zendMimeMessageObj)
    {
        $this->mailMessageConfigObj = $mailMessageConfigObj;
        $this->mailMessageHelperObj = $mailMessageHelperObj;
        $this->zendMimeMessageObj = $zendMimeMessageObj;

        $this->setEncoding();
        $this->setFrom();
        $this->setReplyTo();
        $this->setSubject();
        $this->setBody();
    }

    public function setEncoding($encoding = null)
    {
        if ($encoding == null) {
            $encoding = $this->mailMessageConfigObj->getEncoding();
        }

        parent::setEncoding($encoding);
        return $this;
    }

    public function setFrom($emailOrAddressList = null, $name = null)
    {
        if ($emailOrAddressList == null && $name == null) {
            $emailOrAddressList = $this->mailMessageConfigObj->getFrom();
            $name = $this->mailMessageConfigObj->getFromName();
        }

        parent::setFrom($emailOrAddressList, $name);
        return $this;
    }

    public function setReplyTo($emailOrAddressList = null, $name = null)
    {
        if ($emailOrAddressList == null && $name == null) {
            $emailOrAddressList = $this->mailMessageConfigObj->getReplyTo();
            $name = $this->mailMessageConfigObj->getReplyName();
        }

        parent::setReplyTo($emailOrAddressList, $name);
        return $this;
    }

    public function setSubject($template = null, $templateVars = null, $subjectString = null)
    {
        if ($subjectString == null) {

            $subjectView = $this->mailMessageHelperObj->cloneSubjectView();

            $templateSubjectFolder = $this->mailMessageConfigObj->getTemplateSubjectFolder();
            if ($template == null) {
                $template = $this->mailMessageConfigObj->getTemplateName();
            }
            $subjectView->setTemplate($templateSubjectFolder . $template);

            if ($templateVars == null) {
                $templateVars = $this->mailMessageConfigObj->getTemplateVars();
            } else {
                $templateVars = $this->mailMessageConfigObj->addTemplateVars($templateVars);
            }
            $subjectView->setVariables($templateVars);

            $subject = $this->mailMessageHelperObj->render($subjectView);

        } else {
            $subject = $subjectString;
        }

        parent::setSubject($subject);
        return $this;
    }

    public function setBody($template = null, $templateVars = null, $mimeType = null, $layout = null, $bodyString = null)
    {
        if ($bodyString == null) {

            if ($mimeType == null) {
                $mimeType = $this->mailMessageHelperObj->getMimeType();
            }

            // TODO: die Folder bleiben fux und können in Helper
            $contentBodyTxtFolder = $this->mailMessageConfigObj->getTemplateBodyTxtFolder();
            $contentBodyHtmlFolder = $this->mailMessageConfigObj->getTemplateBodyHtmlFolder();
            $layoutTxtFolder = $this->mailMessageConfigObj->getLayoutTxtFolder();
            $layoutHtmlFolder = $this->mailMessageConfigObj->getLayoutHtmlFolder();

            if ($template == null) {
                $template = $this->mailMessageConfigObj->getTemplateName();
            }

            if ($layout == null) {
                $layout = $this->mailMessageConfigObj->getLayoutName();
            }

            if ($templateVars == null) {
                $templateVars = $this->mailMessageConfigObj->getTemplateVars();
            } else {
                $templateVars = $this->mailMessageConfigObj->addTemplateVars($templateVars);
            }

            $txtMimePartObj = null;
            $htmlMimePartObj = null;

            switch ($mimeType) {
                case self::TXT_TYPE:
                    // TODO: anpassen, wie html
                    $txtMimePartObj = $this->mailMessageHelperObj->createMimePartObj($contentBodyTxtFolder, $layoutTxtFolder, $template, $templateVars, $layout);
                    break;
                case self::HTML_TYPE:

                    // TODO: helper::createHtmlContent($template, TemplateVars)
                    //  übergeben:
                    $htmlContentView = $this->mailMessageHelperObj->cloneHtmlContentView();
                    $htmlContentView
                            ->setOption('has_parent', true)
                            ->setTemplate($contentBodyHtmlFolder . $template)
                            ->setVariables($templateVars);

                    $htmlContent = $this->mailMessageHelperObj->render($htmlContentView);

                    // TODO: helper::createHtmlLayout($layout)
                    //  übergeben: $layout
                    $htmlLayoutView = $this->mailMessageHelperObj->cloneHtmlLayoutView();
                    $htmlLayoutView
                        ->setOption('has_parent', true)
                        ->setTemplate($layoutHtmlFolder . $layout)
                        ->setVariable($this->mailMessageConfigObj->getTemplateVar(), $htmlContent);

                    $htmlLayout = $this->mailMessageHelperObj->render($htmlLayoutView);


                    // TODO: helper::createHtmlMimePart(htmlLayout)
                    $htmlMimePartObj = $this->mailMessageHelperObj->createMimePartObj($htmlLayout);
                    $htmlMimePartObj->type = self::MIME_PART_HTML_TYPE;
                    $body = $this->zendMimeMessageObj;
                    $body->addPart($htmlMimePartObj);


                    break;
                case self::MULTI_TYPE:
                    // TODO: anpassen, wie html
                    $txtMimePartObj = $this->mailMessageHelperObj->createMimePartObj($contentBodyTxtFolder, $layoutTxtFolder, $template, $templateVars, $layout);
                    $htmlMimePartObj = $this->mailMessageHelperObj->createMimePartObj($contentBodyHtmlFolder, $layoutHtmlFolder, $template, $templateVars, $layout);
            }

            // TODO: das kann dann raus
            if ($txtMimePartObj != null) {
                $txtMimePartObj->type = self::MIME_PART_TXT_TYPE;
                $this->zendMimeMessageObj->addPart($txtMimePartObj);
            }
            if ($htmlMimePartObj != null) {
                $htmlMimePartObj->type = self::MIME_PART_HTML_TYPE;
                $this->zendMimeMessageObj->addPart($htmlMimePartObj);
            }
            if ($txtMimePartObj && $htmlMimePartObj) {
                $this->getHeaders()->get('content-type')->setType('multipart/alternative');
            }

            $body = $this->zendMimeMessageObj;
        } else {
            $body = $bodyString;
        }


        parent::setBody($body);

        $this->getHeaders()->get('content-type')->setType('multipart/alternative');

        return $this;
    }
}