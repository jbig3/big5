<?php
namespace Jbig3Resource\Backend\Controller\Create;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydratorObj;

use Jbig3Resource\General\Controller\ControllerFieldset;
use Jbig3Resource\Module;

class ControllerCreateFormFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {

        $mapperEntityFqcn = 'Jbig3Resource\General\Controller\ControllerEntity';
        $inverseEntityFqcn = 'Jbig3Resource\General\Module\ModuleEntity';
        $mapperEntityObj = $sm->get('controllerEntity-jbig3resource');

        $em = $sm->get('jbig3-em');
        $doctrineHydratorObj = new DoctrineHydratorObj($em, $mapperEntityFqcn);

        $fieldsetNameStr = 'controllerCreateFieldset';
        $translatorObj = $sm->get('translator');

        $fieldsetObj = new ControllerFieldset($doctrineHydratorObj, $mapperEntityObj, $fieldsetNameStr, $translatorObj, $em, $inverseEntityFqcn);

        $formNameStr = 'controllerCreateForm';
        $valueName = $translatorObj->translate('Create', Module::TEXT_DOMAIN);
        $srv = new ControllerCreateForm($formNameStr, $valueName, $doctrineHydratorObj, $fieldsetObj);

        return $srv;
    }
}