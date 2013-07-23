<?php
namespace Jbig3Base\Service;

use Zend\Form\Form;

use Jbig3Base\Service\BaseServiceAbstract;

abstract class BaseUpdateServiceAbstract extends BaseServiceAbstract
{
    public function getPopulateForm($field, $value)
    {
        $entityObj = $this->getEntityObj($field, $value);
        $formObj = $this->getFormObj($entityObj);

        return $formObj;
    }

    public function update($postData)
    {
        $this->formObj->setData($postData);

        if (!$this->formObj->isValid()) {
            return false;
        }

        $this->getMapperObj()->persist($this->entityObj);

        $this->getEvent();

        return true;
    }


}