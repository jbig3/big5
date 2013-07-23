<?php
namespace Jbig3Resource\General\Module;

use Jbig3Resource\General\Base\BaseResourceFieldsetAbstract,
    DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydratorObj,
    Zend\MVC\I18n\Translator as TranslatorObj;

class ModuleFieldset extends BaseResourceFieldsetAbstract
{

    public function __construct(
            DoctrineHydratorObj $doctrineHydratorObj,
            $controllerEntityObj,
            $fieldsetNameStr,
            TranslatorObj $translator)
    {
        parent::__construct($fieldsetNameStr, $translator);

        $this->setHydrator($doctrineHydratorObj);
        $this->setObject($controllerEntityObj);

        $this->createIdField();
        $this->createNameField();
        $this->createDescriptionField();
        $this->createIsActiveField();
    }
}