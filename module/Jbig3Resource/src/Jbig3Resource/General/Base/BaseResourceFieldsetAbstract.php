<?php
namespace Jbig3Resource\General\Base;

use Jbig3Base\Form\Fieldset\BaseFieldsetAbstract,
    Zend\MVC\I18n\Translator as TranslatorObj;

abstract class BaseResourceFieldsetAbstract
    extends BaseFieldsetAbstract
{

    public function __construct(
            $formNameStr,
            TranslatorObj $translator)
    {
        parent::__construct($formNameStr, $translator);

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