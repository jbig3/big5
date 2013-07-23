<?php
namespace Jbig3Tryings\Crud\OneToMany\ObjectSelect;

use Zend\Form\Fieldset,
    Zend\InputFilter\InputFilterProviderInterface;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

use Jbig3Tryings\Crud\OneToMany\ObjectSelect\CrudOtmObjectSelectControllerEntity;

class CrudOtmObjectSelectControllerFieldset extends Fieldset implements InputFilterProviderInterface
{
    protected $entityFqcn = 'Jbig3Tryings\Crud\OneToMany\ObjectSelect\CrudOtmObjectSelectControllerEntity';
    protected $entity2Fqcn = 'Jbig3Tryings\Crud\OneToMany\ObjectSelect\CrudOtmObjectSelectModuleEntity';

    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('crud-object-select-controller-fieldset');

        $hydrator = new DoctrineHydrator($objectManager, $this->entityFqcn);
        $this->setHydrator($hydrator);
        $this->setObject(new CrudOtmObjectSelectControllerEntity());

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

        // https://github.com/doctrine/DoctrineModule/blob/master/docs/form-element.md
        $this->add(
            array( // \ObjectSelect | \ObjectRadio | \ObjectMultiCheckbox
                'type' => 'DoctrineModule\Form\Element\ObjectSelect',
                'name' => 'module',
                'options' => array(
                    'object_manager' => $objectManager,
                    'target_class' => $this->entity2Fqcn,
                    'property' => 'description',
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