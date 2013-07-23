<?php
namespace Jbig3Base\Service;

use Zend\Form\Form;

use Jbig3Base\Service\BaseServiceAbstract;

abstract class BaseDeleteServiceAbstract extends BaseServiceAbstract
{
    public function delete($field, $value)
    {
        $entityObj = $this->getEntityObj($field, $value);

        if($entityObj){
            $this->getMapperObj()->remove($this->entityObj);
            $this->getEvent();
            return true;
        }
        return false;
    }


}