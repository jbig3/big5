<?php
namespace Jbig3User\Frontend\Form\Activate;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Debug\Debug;

use Jbig3User\Frontend\Form\Activate\ActivateForm;

class ActivateFormFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $name = 'activate';
        $translator = $sm->get('translator');
        $action = '/user/activate-form';
        $inputFilter = $sm->get('frontendActivateFormFilterFactory-jbig3user');

        $srv = new ActivateForm($name, $translator, $action, $inputFilter);

        return $srv;
    }


}