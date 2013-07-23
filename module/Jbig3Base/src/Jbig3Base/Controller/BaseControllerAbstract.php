<?php
namespace Jbig3Base\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\Mvc\I18n\Translator;

abstract class BaseControllerAbstract extends AbstractActionController
{
    protected $serviceObj;
    protected $translatorObj;

    protected $field;
    protected $viewKey;
    protected $successRoute;
    protected $successMessage;

    public function __construct($serviceObj = null)
    {
        $this->setServiceObj($serviceObj);
    }

    public function getServiceObj()
    {
        return $this->serviceObj;
    }

    public function setServiceObj($serviceObj)
    {
        $this->serviceObj = $serviceObj;
        return $this;
    }

    public function getTranslatorObj()
    {
        return $this->translatorObj;
    }

    public function setTranslatorObj(Translator $translatorObj)
    {
        $this->translatorObj = $translatorObj;
        return $this;
    }

    public function getViewModel($viewKey, $content)
    {
        return array(
            $viewKey => $content
        );
    }

    public function getField()
    {
        return $this->field;
    }

    public function setField($field = 'id')
    {
        $this->field = $field;
    }

    public function getViewKey()
    {
        return $this->viewKey;
    }

    public function setViewKey($viewKey)
    {
        $this->viewKey = $viewKey;
    }


    public function getSuccessRoute()
    {
        return $this->successRoute;
    }

    public function setSuccessRoute($successRoute)
    {
        $this->successRoute = $successRoute;
    }

    public function getSuccessMessage()
    {
        return $this->successMessage;
    }

    public function setSuccessMessage($successMessage)
    {
        $this->successMessage = $this->flashMessenger()->addMessage($successMessage);
    }
}