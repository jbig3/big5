<?php
namespace Jbig3Resource\Backend\Controller\Update;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydratorObj;

use Jbig3Resource\General\Controller\ControllerFieldset;
use Jbig3Resource\Module;

class ControllerUpdateFormFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {

        $mapperEntityFqcn = 'Jbig3Resource\General\Controller\ControllerEntity';
        $inverseEntityFqcn = 'Jbig3Resource\General\Module\ModuleEntity';
        $em = $sm->get('jbig3-em');
        $doctrineHydratorObj = new DoctrineHydratorObj($em, $mapperEntityFqcn);

        $mapperEntityObj = $sm->get('controllerEntity-jbig3resource');
        $formFieldsetNameStr = 'controllerUpdateFieldset';
        $translatorObj = $sm->get('translator');
        $fieldsetObj = new ControllerFieldset($doctrineHydratorObj, $mapperEntityObj, $formFieldsetNameStr, $translatorObj, $em, $inverseEntityFqcn);


        $formNameStr = 'controllerUpdateForm';
        $valueName = $translatorObj->translate('Update', Module::TEXT_DOMAIN);
        $srv = new ControllerUpdateForm($formNameStr, $valueName, $doctrineHydratorObj, $fieldsetObj);

        return $srv;
    }
}