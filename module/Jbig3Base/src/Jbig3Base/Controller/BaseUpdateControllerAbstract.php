<?php
namespace Jbig3Base\Controller;

abstract class BaseUpdateControllerAbstract extends BaseControllerAbstract
{
    public function updateAction()
    {
        $field = $this->getField();
        $value = $this->params($field);

        $formObj = $this->serviceObj->getPopulateForm($field, $value);

        $viewKey = $this->getViewKey();
        $formView = $this->getViewModel($viewKey, $formObj);

        if ($this->getRequest()->isPost()) {
            $postData = $this->getRequest()->getPost();

            $validFormObj = $this->serviceObj->update($postData);

            if (!$validFormObj) {
                return $formView;
            }

            $this->getSuccessMessage();
            return $this->redirect()->toUrl($this->url()->fromRoute($this->getSuccessRoute()));
        }else{
            return $formView;
        }
    }
}