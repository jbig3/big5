<?php
namespace Jbig3Base\Controller;

abstract class BaseReadControllerAbstract extends BaseControllerAbstract
{
    public function readAction()
    {
        $viewObj = $this->serviceObj->read();
        $viewKey = $this->getViewKey();
        $formView = $this->getViewModel($viewKey, $viewObj);

        return $formView;
    }
}