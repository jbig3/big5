<?php
namespace Jbig3Tryings\Crud\Solo;

use Zend\Form\Fieldset,
    Zend\InputFilter\InputFilterProviderInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class CrudSoloFieldset extends Fieldset implements InputFilterProviderInterface
{
    protected $entityFqcn = 'Jbig3Tryings\Crud\Solo\CrudSoloEntity';

    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('soloFieldset');

        $hydrator = new DoctrineHydrator($objectManager, $this->entityFqcn);

        $this->setHydrator($hydrator);

        $this->add(array(
            'type' => 'hidden',
            'name' => 'id',
        ));

        $this->add(array(
            'name' => 'name',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'id' => 'name',
                'label' => 'Ihr Name:',
            )
        ));

        $this->add(array(
            'name' => 'description',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'id' => 'description',
                'label' => 'Beschreibung:'
            ),
        ));
    }

    public function getInputFilterSpecification()
    {
        return array(
            'name' => array(
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                \Zend\Validator\NotEmpty::IS_EMPTY =>
                                'Bitte geben Sie etwas ein.'
                            )
                        )
                    ),
                ),
            ),

            'description' => array(
                'filters' => array(
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                \Zend\Validator\NotEmpty::IS_EMPTY =>
                                'Bitte geben Sie etwas ein.'
                            )
                        )
                    )
                )
            )
        );
    }
}