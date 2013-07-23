<?php
namespace Jbig3Base\Controller;

abstract class BaseDeleteControllerAbstract extends BaseControllerAbstract
{
    public function deleteAction()
    {
        $field = $this->getField();
        $value = $this->params($field);

        $entityObj = $this->serviceObj->delete($field, $value);

        if ($entityObj) {
            $this->getSuccessMessage();
            return $this->redirect()->toUrl($this->url()->fromRoute($this->getSuccessRoute()));
        }
    }
}