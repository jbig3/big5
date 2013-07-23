<?php
namespace Jbig3Tryings\Crud\OneToMany\ObjectSelect;

use Zend\Form\Form;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

use Jbig3Tryings\Crud\OneToMany\ObjectSelect\CrudOtmObjectSelectModuleFieldset;

class CrudOtmObjectSelectCreateForm extends Form
{

    protected $entityFqcn = 'Jbig3Tryings\Crud\OneToMany\ObjectSelect\CrudOtmObjectSelectModuleEntity';
    protected $entity2Fqcn = 'Jbig3Tryings\Crud\OneToMany\ObjectSelect\CrudOtmObjectSelectControllerEntity';

    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('crud-otm-object-select-create-form');

        $this->setAttribute('action', '');
        $this->setAttribute('method', 'post');

        $hydrator = new DoctrineHydrator($objectManager, $this->entityFqcn);
        $this->setHydrator($hydrator);

        $fieldset = new CrudOtmObjectSelectModuleFieldset($objectManager);
        $fieldset->setUseAsBaseFieldset(true);
        $this->add($fieldset);

        $this->add(
            array(
                'type' => 'DoctrineModule\Form\Element\ObjectSelect',
                'name' => 'controllerSelect',
                'options' => array(
                    'object_manager' => $objectManager,
                    'target_class' => $this->entity2Fqcn,
//                    'property' => 'description',
                    'label_generator' => function($targetEntity) {
                        return $targetEntity->getId() . ' - ' . $targetEntity->getName();
                    }
                ),
            )
        );

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'create'
            ),
        ));
    }
}