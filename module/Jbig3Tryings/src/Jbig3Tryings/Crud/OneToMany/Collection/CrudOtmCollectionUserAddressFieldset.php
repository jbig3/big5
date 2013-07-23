<?php
namespace Jbig3Tryings\Crud\OneToMany\Collection;

use Zend\Form\Fieldset,
    Zend\InputFilter\InputFilterProviderInterface;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Jbig3Tryings\Crud\OneToMany\Collection\CrudOtmCollectionUserAddressEntity;

class CrudOtmCollectionUserAddressFieldset extends Fieldset implements InputFilterProviderInterface
{
    protected $entityFqcn = 'Jbig3Tryings\Crud\OneToMany\Collection\CrudOtmCollectionUserAddressEntity';

    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('crud-otm-collection-user-address-fieldset');

        $hydrator = new DoctrineHydrator($objectManager, $this->entityFqcn);
        $this->setHydrator($hydrator);
        $this->setObject(new CrudOtmCollectionUserAddressEntity);

        $this->setLabel('UserAddressFieldsetLabel');

        $this->add(array(
           'type' => 'hidden',
            'name' => 'id'
        ));

        $this->add(array(
            'type' => 'text',
            'name' => 'street',
            'options' => array(
                'label' => 'Ihre Strasse:',
            )
        ));

        $this->add(array(
            'type' => 'text',
            'name' => 'streetNumber',
            'options' => array(
                'label' => 'Ihre Hausnummer:',
            )
        ));

        $this->add(array(
            'type' => 'text',
            'name' => 'zipcode',
            'options' => array(
                'label' => 'Ihre Postleitzahl:',
            )
        ));

        $this->add(array(
            'type' => 'text',
            'name' => 'city',
            'options' => array(
                'label' => 'Ihre Stadt:',
            )
        ));
    }

    public function getInputFilterSpecification()
    {
        return array(
//            'id' => array(
//                'required' => 'false'
//            ),

            'street' => array(
                'required' => 'true'
            ),

            'streetNumber' => array(
                'required' => 'true'
            ),

            'zipcode' => array(
                'required' => 'true'
            ),

            'city' => array(
                'required' => 'true'
            ),
        );
    }
}