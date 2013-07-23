<?php
namespace Jbig3Tryings\Crud\OneToMany\Collection;

use Zend\Form\Form;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

use Jbig3Tryings\Crud\OneToMany\Collection\CrudOtmCollectionUserFieldset as CrudOtmCollectionUserFieldsetObj;

class CrudOtmCollectionUpdateForm extends Form
{

    protected $entityFqcn = 'Jbig3Tryings\Crud\OneToMany\Collection\CrudOtmCollectionUserEntity';

    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('crud-otm-collection-update-form');

        $this->setAttribute('action', '');
        $this->setAttribute('method', 'post');

        $hydrator = new DoctrineHydrator($objectManager, $this->entityFqcn);
        $this->setHydrator($hydrator);

        $fieldset = new CrudOtmCollectionUserFieldsetObj($objectManager);
        $fieldset->setUseAsBaseFieldset(true);
        $this->add($fieldset);

//        $this->add(array(
//            'type' => 'Jbig3Tryings\Crud\Form\Fieldset\TestSoloFieldset',
//            'options' => array(
//                'use_as_base_fieldset' => true
//            )
//        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'update'
            ),
        ));
    }
}