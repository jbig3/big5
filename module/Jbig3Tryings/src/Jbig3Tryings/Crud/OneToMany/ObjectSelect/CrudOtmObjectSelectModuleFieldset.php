<?php
namespace Jbig3Tryings\Crud\OneToMany\ObjectSelect;

use Zend\Form\Fieldset,
    Zend\InputFilter\InputFilterProviderInterface;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

use Jbig3Tryings\Crud\OneToMany\ObjectSelect\CrudOtmObjectSelectModuleEntity;
use Jbig3Tryings\Crud\OneToMany\ObjectSelect\CrudOtmObjectSelectControllerFieldset;

class CrudOtmObjectSelectModuleFieldset extends Fieldset implements InputFilterProviderInterface
{
    protected $entityFqcn = 'Jbig3Tryings\Crud\OneToMany\ObjectSelect\CrudOtmObjectSelectModuleEntity';


    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('crud-object-select-module-fieldset');

        $hydrator = new DoctrineHydrator($objectManager, $this->entityFqcn);
        $this->setHydrator($hydrator);
        $this->setObject(new CrudOtmObjectSelectModuleEntity());

        $this->add(array(
            'type' => 'hidden',
            'name' => 'id',
        ));

        $this->add(array(
            'type' => 'text',
            'name' => 'name',
            'options' => array(
                'label' => 'Ihr Name:',
            )
        ));

        $this->add(array(
            'type' => 'text',
            'name' => 'description',
            'options' => array(
                'label' => 'Beschreibung:',
            )
        ));

        $controllerFieldset = new CrudOtmObjectSelectControllerFieldset($objectManager);

        $this->add(array(
                'type' => 'Zend\Form\Element\Collection',
                'name' => 'controllers',
                'options' => array(
                    'label' => 'Controller: ',
                    'count' => 2,
                    'should_create_template' => true,
                    'allow_add' => true,
                    'target_element' => $controllerFieldset,
                )
            )
        );



    }

    public function getInputFilterSpecification()
    {
        return array(
        );
    }
}