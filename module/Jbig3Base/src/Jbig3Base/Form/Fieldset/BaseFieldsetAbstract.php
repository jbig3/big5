<?php
namespace Jbig3Base\Form\Fieldset;

use Zend\Form\Fieldset,
    Zend\InputFilter\InputFilterProviderInterface,
    Zend\MVC\I18n\Translator as TranslatorObj;

abstract class BaseFieldsetAbstract
    extends Fieldset
    implements InputFilterProviderInterface
{
    protected $translator;

    public function __construct($formNameStr, TranslatorObj $translator)
    {
        parent::__construct($formNameStr);

        $this->setTranslator($translator);
        $this->createIdField();

    }

    public function getTranslator()
    {
        return $this->translator;
    }

    public function setTranslator($translator){
        $this->translator = $translator;
    }

    public function createIdField()
    {
        $this->add(array(
            'type' => 'hidden',
            'name' => 'id',
        ));
    }
}