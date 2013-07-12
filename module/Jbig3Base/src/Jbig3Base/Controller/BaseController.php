<?php
namespace Jbig3Base\Controller;
use Zend\Mvc\Controller\AbstractActionController,
    Zend\Mvc\I18n\Translator;


/**
 * allgemeine Mehoden allgemeine Attribute wird von jedem Controller erweitert
 * @author Gregory
 * @version 1.0
 * @updated 02-Jun-2013 11:57:36
 */
class BaseController extends AbstractActionController
{
    protected $translator;
    protected $service;

    public function getTranslator()
    {
        return $this->translator;
    }

    public function setTranslator(Translator $translator)
    {
        $this->translator = $translator;
        return $this;
    }

    public function getService()
    {
        return $this->service;
    }

    public function setService($service)
    {
        $this->service = $service;
        return $this;
    }
}