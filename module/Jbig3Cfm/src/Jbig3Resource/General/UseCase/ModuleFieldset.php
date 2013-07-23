<?php
namespace Jbig3Resource\General\Namesapce;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydratorObj,
    Zend\MVC\I18n\Translator as TranslatorObj,
    Jbig3Base\Form\Fieldset\BaseFieldsetAbstract;

class ModuleFieldset extends BaseFieldsetAbstract
{

    public function __construct(
            DoctrineHydratorObj $doctrineHydratorObj,
            $mapperEntityObj,
            $fieldsetNameStr,
            TranslatorObj $translator)
    {
        parent::__construct($fieldsetNameStr, $translator);

        $this->setHydrator($doctrineHydratorObj);
        $this->setObject($mapperEntityObj);

        $this->createIdField();
        $this->createNameField();
        $this->createDescriptionField();
        $this->createIsActiveField();
    }

    public function createNameField(){
        $this->add(array(
            'type' => 'text',
            'name' => 'name',
            'options' => array(
                'label' => $this->translator->translate('Ihr Name:'),
            )
        ));
    }

    public function createDescriptionField()
    {
        $this->add(array(
            'type' => 'text',
            'name' => 'description',
            'options' => array(
                'label' => $this->translator->translate('Beschreibung:'),
            )
        ));
    }

    public function createIsActiveField()
    {
        $this->add(array(
            'type' => 'checkbox',
            'name' => 'isActive',
            'options' => array(
                'label' => $this->translator->translate('Ist Aktiv:'),
            )
        ));
    }

    public function getInputFilterSpecification()
    {
        return array(
            'name' => array(
                'required' => true
            ),
            'description' => array(
                'required' => true
            ),
        );
    }
}