<?php

namespace Jbig3Mail\Config;

use Zend\Debug\Debug;

use Jbig3Mail\Config\MailConfig;

class MailMessageConfig extends MailConfig
{
    protected $encoding;
    protected $from;
    protected $fromName;
    protected $replyTo;
    protected $replyName;

    protected $templatePathStack;
    
    protected $templateSubjectFolder;
    protected $templateBodyTxtFolder;
    protected $templateBodyHtmlFolder;
    protected $layoutTxtFolder;
    protected $layoutHtmlFolder;
    
    protected $mimeType;
    protected $templateName;
    protected $layoutName;

    protected $templateVar;
    protected $templateVars = array();


    public function getEncoding()
    {
        if ($this->encoding == null) {
            $this->setEncoding();
        }
        return $this->encoding;
    }

    public function setEncoding($encoding = null)
    {
        if($encoding == null){
            $this->encoding = $this->config['address']['encoding'];
        }else{
            $this->encoding = $encoding;
        }

    }

    public function getFrom()
    {
        if ($this->from == null) {
            $this->setFrom();
        }
        return $this->from;
    }

    public function setFrom($from = null)
    {
        if($from == null){
            $this->from = $this->config['address']['from_email'];
        }else{
            $this->from = $from;
        }
    }

    public function getFromName()
    {
        if ($this->fromName == null) {
            $this->setFromName();
        }
        return $this->fromName;
    }

    public function setFromName($fromName = null)
    {
        if($fromName == null){
            $this->fromName = $this->config['address']['from_name'];
        }else{
            $this->fromName = $fromName;
        }
    }

    public function getReplyTo()
    {
        if ($this->replyTo == null) {
            $this->setReplyTo();
        }
        return $this->replyTo;
    }

    public function setReplyTo($replyTo = null)
    {
        if($replyTo == null){
            $this->replyTo = $this->config['address']['reply_to'];
        }else{
            $this->replyTo = $replyTo;
        }
    }

    public function getReplyName()
    {
        if ($this->replyName == null) {
            $this->setReplyName();
        }
        return $this->replyName;
    }

    public function setReplyName($replyName = null)
    {
        if($replyName == null){
            $this->replyName = $this->config['address']['reply_to_name'];
        }else{
            $this->replyName = $replyName;
        }
    }

    public function getTemplatePathStack()
    {
        if ($this->templatePathStack == null) {
            $this->setTemplatePathStack();
        }
        return $this->templatePathStack;
    }

    public function setTemplatePathStack($templatePathStack = null)
    {
        if($templatePathStack == null){
            $this->templatePathStack = $this->config['content']['template_path_stack'];
        }else{
            $this->templatePathStack = $templatePathStack;
        }
    }

    public function getTemplateSubjectFolder()
    {
        if($this->templateSubjectFolder == null){
            $this->setTemplateSubjectFolder();
        }
        return $this->templateSubjectFolder;
    }

    public function setTemplateSubjectFolder($subjectFolder = null)
    {
        if($subjectFolder == null){
            $this->templateSubjectFolder = $this->config['folder']['content']['subject'];
        }else{
            $this->templateSubjectFolder = $subjectFolder;
        }
    }

    public function getTemplateBodyTxtFolder()
    {
        if($this->templateBodyTxtFolder == null){
            $this->setTemplateBodyTxtFolder();
        }
        return $this->templateBodyTxtFolder;
    }

    public function setTemplateBodyTxtFolder($txtBodyFolder = null)
    {
        if($txtBodyFolder == null){
            $this->templateBodyTxtFolder = $this->config['folder']['content']['txt'];
        }
    }

    public function getTemplateBodyHtmlFolder()
    {
        if($this->templateBodyHtmlFolder == null){
            $this->setTemplateBodyHtmlFolder();
        }
        return $this->templateBodyHtmlFolder;
    }

    public function setTemplateBodyHtmlFolder($htmlBodyFolder = null)
    {
        if($htmlBodyFolder == null){
            $this->templateBodyHtmlFolder = $this->config['folder']['content']['html'];
        }
    }

    public function getLayoutTxtFolder()
    {
        if($this->layoutTxtFolder == null){
            $this->setLayoutTxtFolder();
        }
        return $this->layoutTxtFolder;
    }

    public function setLayoutTxtFolder($txtBodyFolder = null)
    {
        if($txtBodyFolder == null){
            $this->layoutTxtFolder = $this->config['folder']['layout']['txt'];
        }
    }

    public function getLayoutHtmlFolder()
    {
        if($this->layoutHtmlFolder == null){
            $this->setLayoutHtmlFolder();
        }
        return $this->layoutHtmlFolder;
    }

    public function setLayoutHtmlFolder($HtmlBodyFolder = null)
    {
        if($HtmlBodyFolder == null){
            $this->layoutHtmlFolder = $this->config['folder']['layout']['html'];
        }
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
        if($mimeType == null){
            $this->mimeType = $this->config['content']['mimeType'];
        }else{
            $this->mimeType = $mimeType;
        }
    }

    public function getTemplateName()
    {
        if ($this->templateName == null) {
            $this->setTemplateName();
        }
        return $this->templateName;
    }

    public function setTemplateName($templateName = null)
    {
        if($templateName == null){
            $this->templateName = $this->config['content']["template_name"];
        }else{
            $this->templateName = $templateName;
        }
    }

    public function getLayoutName()
    {
        if ($this->layoutName == null) {
            $this->setLayoutName();
        }
        return $this->layoutName;
    }

    public function setLayoutName($layoutName = null)
    {
        if($layoutName == null){
            $this->layoutName = $this->config['content']['layout_name'];
        }else{
            $this->layoutName = $layoutName;
        }
    }

    public function getTemplateVar()
    {
        if ($this->templateVar == null) {
            $this->setTemplateVar();
        }
        return $this->templateVar;
    }

    public function setTemplateVar($templateVar = null)
    {
        if($templateVar == null){
            $this->templateVar = $this->config['content']["template_var"];
        }else{
            $this->templateVar = $templateVar;
        }
    }

    public function getTemplateVars()
    {
        if ($this->templateVars == null) {
            $this->setTemplateVars();
        }
        return $this->templateVars;
    }

    public function setTemplateVars(array $templateVars = null)
    {
        if($templateVars == null){
            $this->templateVars = array_merge($this->config['content']["template_vars"], $this->toArray());
        }else{
            unset($this->templateVars);
            $this->templateVars = $templateVars;
        }
    }

    public function addTemplateVars(array $templateVars)
    {
        if($this->templateVars == null){
            $this->setTemplateVars();
        }

        $this->templateVars = array_merge($this->templateVars, $templateVars);
        return $this->templateVars;
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