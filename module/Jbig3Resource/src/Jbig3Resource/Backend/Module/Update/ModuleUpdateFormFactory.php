<?php
namespace Jbig3Resource\Backend\Module\Update;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydratorObj;

use Jbig3Resource\General\Module\ModuleFieldset;
use Jbig3Resource\Module;

class ModuleUpdateFormFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {

        $mapperEntityFqcn = 'Jbig3Resource\General\Module\ModuleEntity';
        $em = $sm->get('jbig3-em');
        $doctrineHydratorObj = new DoctrineHydratorObj($em, $mapperEntityFqcn);

        $mapperEntityObj = $sm->get('moduleEntity-jbig3resource');
        $formFieldsetNameStr = 'moduleUpdateFieldset';
        $translatorObj = $sm->get('translator');
        $fieldsetObj = new ModuleFieldset($doctrineHydratorObj, $mapperEntityObj, $formFieldsetNameStr, $translatorObj);


        $formNameStr = 'moduleUpdateForm';
        $valueName = $translatorObj->translate('Update', Module::TEXT_DOMAIN);
        $srv = new ModuleUpdateForm($formNameStr, $valueName, $doctrineHydratorObj, $fieldsetObj);

        return $srv;
    }
}