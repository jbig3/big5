<?php
namespace Jbig3Base\Service;

use Zend\Form\Form;

use Jbig3Base\Service\BaseServiceAbstract;

abstract class BaseCreateServiceAbstract extends BaseServiceAbstract
{
    public function create($postData)
    {
        $entityObj = $this->getEntityObj();
        $formObj = $this->getFormObj($entityObj);
        $formObj->setData($postData);

        if (!$formObj->isValid()) {
            return false;
        }

        $this->getMapperObj()->persist($entityObj);

        $this->getEvent();

        return $entityObj;
    }
}