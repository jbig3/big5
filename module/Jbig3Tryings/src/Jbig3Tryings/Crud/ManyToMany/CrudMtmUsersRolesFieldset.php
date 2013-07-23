<?php
namespace Jbig3Tryings\Crud\ManyToMany;

use Zend\Form\Fieldset,
    Zend\InputFilter\InputFilterProviderInterface;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class CrudMtmUsersRolesFieldset extends Fieldset implements InputFilterProviderInterface
{
    protected $usersRolesEntityFqcn = 'Jbig3Tryings\Crud\ManyToMany\CrudMtmUsersRolesEntity';
    protected $userEntityFqcn = 'Jbig3Tryings\Crud\ManyToMany\CrudMtmUserEntity';
//    protected $roleEntityFqcn = 'Jbig3Tryings\Crud\ManyToMany\CrudMtmRoleEntity';

    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('crud-mtm-user-roles-fieldset');

        $hydrator = new DoctrineHydrator($objectManager, $this->usersRolesEntityFqcn);
        $this->setHydrator($hydrator);
        $this->setObject(new CrudMtmUsersRolesEntity());

        $this->add(array(
            'type' => 'hidden',
            'name' => 'id',
        ));

        $this->add(
            array( // \ObjectSelect | \ObjectRadio | \ObjectMultiCheckbox
                'type' => 'DoctrineModule\Form\Element\ObjectSelect',
                'name' => 'user',
                'options' => array(
                    'object_manager' => $objectManager,
                    'target_class' => $this->userEntityFqcn,
                    'property' => 'surname',
//                    funktioniert so nicht: !
//                    'label_generator' => function($targetEntity) {
//                        return $targetEntity->getId() . ' - ' . $targetEntity->getName();
//                    }
//                  Methode muss im Repo vorhanden sein!
//                    'is_method'      => true,
//                    'find_method'    => array(
//                        'name'   => 'findBy',
//                        'params' => array(
//                            'criteria' => array('active' => 1),
//                            'orderBy'  => array('lastname' => 'ASC'),
//                        ),
                ),
            )
        );



    }

    public function getInputFilterSpecification()
    {
        return array(
        );
    }
}