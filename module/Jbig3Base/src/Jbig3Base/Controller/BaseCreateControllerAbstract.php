<?php
namespace Jbig3Base\Controller;

abstract class BaseCreateControllerAbstract extends BaseControllerAbstract
{
    public function createAction()
    {
        $formObj = $this->serviceObj->getFormObj();
        $viewKey = $this->getViewKey();
        $formView = $this->getViewModel($viewKey, $formObj);

        if ($this->request->isPost()) {
            $postData = $this->request->getPost();

            $validFormObj = $this->serviceObj->create($postData);

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