<?php
namespace Jbig3Tryings\Crud\OneToMany\ObjectSelect;

use Zend\Form\Form;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

use Jbig3Tryings\Crud\OneToMany\ObjectSelect\CrudOtmObjectSelectModuleFieldset;

class CrudOtmObjectSelectCreateControllerForm extends Form
{
    protected $entityFqcn = 'Jbig3Tryings\Crud\OneToMany\ObjectSelect\CrudOtmObjectSelectControllerEntity';
    protected $entity2Fqcn = 'Jbig3Tryings\Crud\OneToMany\ObjectSelect\CrudOtmObjectSelectModuleEntity';


    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('crud-otm-object-select-create--controller-form');

        $this->setAttribute('action', '');
        $this->setAttribute('method', 'post');

        $hydrator = new DoctrineHydrator($objectManager, $this->entityFqcn);
        $this->setHydrator($hydrator);

        $fieldset = new CrudOtmObjectSelectControllerFieldset($objectManager);
        $fieldset->setUseAsBaseFieldset(true);
        $this->add($fieldset);

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'create'
            ),
        ));
    }
}