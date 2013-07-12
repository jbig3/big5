<?php
namespace Jbig3Tryings\Form;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface,
    Zend\Debug\Debug;

use Jbig3Tryings\Form\TryingsBaseFormFilter as Jbig3TryingsBaseFormFilter;

class TryingsBaseFormFilterFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $recordExistsValidator = $sm->get('jbig3-validator-RecordExistsFactory');

        $srv = new Jbig3TryingsBaseFormFilter($recordExistsValidator);

        return $srv;
    }


}