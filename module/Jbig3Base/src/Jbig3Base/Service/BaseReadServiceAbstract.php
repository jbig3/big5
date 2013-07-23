<?php
namespace Jbig3Base\Service;

use Zend\Form\Form;

use Jbig3Base\Service\BaseServiceAbstract;

abstract class BaseReadServiceAbstract extends BaseServiceAbstract
{
    public function read()
    {
//        $em = $this->getServiceLocator()->get('jbig3-em');
//
//        $solo = $em->getRepository($this->entityFqcn)->findAll();
//
//        $viewModel = $this->getViewModel('solo', $solo);
//        return $viewModel;
//
//
//
//        $entityObj = $this->getEntityObj();
//        $formObj = $this->getFormObj();
//        $formObj->bind($entityObj);
//        $formObj->setData($postData);
//
//        if (!$formObj->isValid()) {
//            return false;
//        }

        $entityObj = $this->getMapperObj()->findAll();

        $this->getEvent();

        return $entityObj;
    }
}