<?php
namespace Jbig3Tryings\Crud\OneToMany\Collection;

use Zend\Form\Fieldset,
    Zend\InputFilter\InputFilterProviderInterface;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

use Jbig3Tryings\Crud\OneToMany\Collection\CrudOtmCollectionUserAddressFieldset as CrudOtmCollectionUserAddressFieldsetObj;
use Jbig3Tryings\Crud\OneToMany\Collection\CrudOtmCollectionUserEntity;

class CrudOtmCollectionUserFieldset extends Fieldset implements InputFilterProviderInterface
{
    protected $entityFqcn = 'Jbig3Tryings\Crud\OneToMany\Collection\CrudOtmCollectionUserEntity';

    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('crud-collection-user-fieldset');

        $hydrator = new DoctrineHydrator($objectManager, $this->entityFqcn);
        $this->setHydrator($hydrator);
        $this->setObject(new CrudOtmCollectionUserEntity);

        $this->add(array(
            'type' => 'hidden',
            'name' => 'id',
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
            'name' => 'name',
            'options' => array(
                'label' => 'Ihr Name:',
            )
        ));

        $userAddressFieldset = new CrudOtmCollectionUserAddressFieldsetObj($objectManager);

        $this->add(array(
                'type' => 'Zend\Form\Element\Collection',
                'name' => 'userAddresses', // wie Entity:Property
                'options' => array(
                    'label' => 'FieldsetLabel',
                    'count' => 2,
                    'should_create_template' => true,
                    'allow_add' => true,
                    'target_element' => $userAddressFieldset,
//                    'target_element' => 'Jbig3Tryings\Crud\OneToMany\Collection\CrudOtmCollectionUserAddressFieldset'
                )
            )
        );

//        $this->add(array(
//                'type' => 'Jbig3Tryings\Crud\OneToMany\Collection\CrudOtmCollectionUserAddressFieldset',
//                'name' => 'Fieldset',
//                'options' => array(
//                    'label' => 'UserAddressFieldsetLabel'
//                )
//            )
//        );
    }

    public function getInputFilterSpecification()
    {
        return array(
//            'id' => array(
//                'required' => 'false'
//            ),
//            'email' => array(
//                'required' => 'false'
//            ),
//            'name' => array(
//                'required' => 'false'
//            )
        );
    }
}