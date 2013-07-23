<?php
namespace Jbig3Tryings\Crud\ManyToMany;

use Zend\Form\Fieldset,
    Zend\InputFilter\InputFilterProviderInterface;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class CrudMtmRoleFieldset extends Fieldset implements InputFilterProviderInterface
{
    protected $entityFqcn = 'Jbig3Tryings\Crud\ManyToMany\CrudMtmRoleEntity';

    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('crud-mtm-role-fieldset');

        $hydrator = new DoctrineHydrator($objectManager, $this->entityFqcn);
        $this->setHydrator($hydrator);
        $this->setObject(new CrudMtmRoleEntity);

        $this->add(array(
            'type' => 'hidden',
            'name' => 'id',
        ));

        $this->add(array(
            'type' => 'text',
            'name' => 'name',
            'options' => array(
                'label' => 'Role Name:',
            )
        ));
    }

    public function getInputFilterSpecification()
    {
        return array(
        );
    }
}