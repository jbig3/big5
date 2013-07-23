<?php
namespace Jbig3Tryings\Crud\ManyToMany;

use Zend\Form\Form;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class CrudMtmCreateRoleForm extends Form
{

    protected $entityFqcn = 'Jbig3Tryings\Crud\ManyToMany\CrudMtmRoleEntity';

    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('crud-mtm-create-role-form');

        $this->setAttribute('action', '');
        $this->setAttribute('method', 'post');

        $hydrator = new DoctrineHydrator($objectManager, $this->entityFqcn);
        $this->setHydrator($hydrator);

        $fieldset = new CrudMtmRoleFieldset($objectManager);
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