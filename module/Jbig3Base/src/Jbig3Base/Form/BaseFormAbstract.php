<?php
namespace Jbig3Base\Form;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Form\Form;
use Zend\Form\FieldsetInterface;

class BaseFormAbstract extends Form
{

    protected $formNameStr;

    public function __construct(
        $formNameStr,
        $valueName,
        DoctrineHydrator $doctrineHydratorObj,
        FieldsetInterface $fieldsetObj)
    {
        parent::__construct($formNameStr);

        $this->setFormNameStr($formNameStr);

        $this->setHydrator($doctrineHydratorObj);
        $fieldsetObj->setUseAsBaseFieldset(true);
        $this->add($fieldsetObj);

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => $valueName
            ),
        ));
    }

    public function getFormNameStr()
    {
        return $this->formNameStr;
    }

    public function setFormNameStr($formNameStr)
    {
        $this->formNameStr = $formNameStr;
    }
}