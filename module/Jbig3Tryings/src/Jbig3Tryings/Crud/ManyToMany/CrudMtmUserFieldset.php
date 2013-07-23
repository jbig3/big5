<?php
namespace Jbig3Tryings\Crud\ManyToMany;

use Zend\Form\Fieldset,
    Zend\InputFilter\InputFilterProviderInterface;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class CrudMtmUserFieldset extends Fieldset implements InputFilterProviderInterface
{
    protected $entityFqcn = 'Jbig3Tryings\Crud\ManyToMany\CrudMtmUserEntity';
    protected $roleEntityFqcn = 'Jbig3Tryings\Crud\ManyToMany\CrudMtmRoleEntity';

    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('crud-mtm-user-fieldset');

        $hydrator = new DoctrineHydrator($objectManager, $this->entityFqcn);
        $this->setHydrator($hydrator);
        $this->setObject(new CrudMtmUserEntity);

        $this->add(array(
            'type' => 'hidden',
            'name' => 'id',
        ));

        $this->add(array(
            'type' => 'text',
            'name' => 'firstname',
            'options' => array(
                'label' => 'Vorname:',
            )
        ));

        $this->add(array(
            'type' => 'text',
            'name' => 'surname',
            'options' => array(
                'label' => 'Nachname:',
            )
        ));

        $this->add(array(
            'type' => 'email',
            'name' => 'email',
            'options' => array(
                'label' => 'Ihre E-Mail-Adresse:'
            ),
        ));


        $this->add(array(
            'type' => 'text',
            'name' => 'password',
            'options' => array(
                'label' => 'Passwort:',
            )
        ));

        $this->add(array(
            'type' => 'checkbox',
            'name' => 'isActive',
            'options' => array(
                'label' => 'Ist Aktiv:',
            )
        ));

        $this->add(
            array( // \ObjectSelect | \ObjectRadio | \ObjectMultiCheckbox
                'type' => 'DoctrineModule\Form\Element\ObjectMultiCheckbox',
                'name' => 'roles',
                'options' => array(
                    'object_manager' => $objectManager,
                    'target_class' => $this->roleEntityFqcn,
                    'property' => 'name',
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

//        $roleFieldset = new CrudMtmRoleFieldset($objectManager);
//
//        $this->add(array(
//                'type' => 'Zend\Form\Element\Collection',
//                'name' => 'roles',
//                'options' => array(
//                    'label' => 'Roles: ',
//                    'count' => 3,
//                    'should_create_template' => true,
//                    'allow_add' => true,
//                    'target_element' => $roleFieldset,
//                )
//            )
//        );
    }

    public function getInputFilterSpecification()
    {
        return array(
        );
    }
}