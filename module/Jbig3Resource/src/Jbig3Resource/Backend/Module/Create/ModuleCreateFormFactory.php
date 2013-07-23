<?php
namespace Jbig3Resource\Backend\Module\Create;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydratorObj;

use Jbig3Resource\General\Module\ModuleFieldset;
use Jbig3Resource\Module;

class ModuleCreateFormFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {

        $mapperEntityFqcn = 'Jbig3Resource\General\Module\ModuleEntity';
        $em = $sm->get('jbig3-em');
        $doctrineHydratorObj = new DoctrineHydratorObj($em, $mapperEntityFqcn);

        $mapperEntityObj = $sm->get('moduleEntity-jbig3resource');
        $formFieldsetNameStr = 'moduleCreateFieldset';
        $translatorObj = $sm->get('translator');
        $fieldsetObj = new ModuleFieldset($doctrineHydratorObj, $mapperEntityObj, $formFieldsetNameStr, $translatorObj);


        $formNameStr = 'moduleCreateForm';
        $valueName = $translatorObj->translate('Create', Module::TEXT_DOMAIN);
        $srv = new ModuleCreateForm($formNameStr, $valueName, $doctrineHydratorObj, $fieldsetObj);

        return $srv;
    }
}