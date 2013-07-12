<?php
namespace Jbig3User\Form\Activate;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface,
    Zend\Debug\Debug;

use Jbig3User\Form\Activate\ActivateForm;

class ActivateFormFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $name = 'activate';
        $translator = $sm->get('translator');
        $action = '/user/activate-form';
        $inputFilter = $sm->get('ActivateFormFilterFactory-jbig3user');

        $srv = new ActivateForm($name, $translator, $action, $inputFilter);

        return $srv;
    }


}