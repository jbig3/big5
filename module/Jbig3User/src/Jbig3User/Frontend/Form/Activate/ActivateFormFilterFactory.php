<?php
namespace Jbig3User\Frontend\Form\Activate;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Debug\Debug;

use Jbig3User\Frontend\Form\Activate\ActivateFormFilter;

class ActivateFormFilterFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $activateNoRecordExistsValidator = $sm->get('generalActivateNoRecordExistsFactory-jbig3user');

        $srv = new ActivateFormFilter(null, $activateNoRecordExistsValidator);

        return $srv;
    }


}