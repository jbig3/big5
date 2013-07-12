<?php
namespace Jbig3User\Form\Activate;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface,
    Zend\Debug\Debug;

use Jbig3User\Form\Activate\ActivateFormFilter;

class ActivateFormFilterFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $activateNoRecordExistsValidator = $sm->get('activateNoRecordExistsFactory-jbig3user');

        $srv = new ActivateFormFilter(null, $activateNoRecordExistsValidator);

        return $srv;
    }


}