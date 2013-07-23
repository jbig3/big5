<?php
namespace Jbig3User\Backend\Form\Insert;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Debug\Debug;

use Jbig3User\Backend\Form\Insert\InsertForm;

class InsertFormFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $name = 'insert';
        $translator = $sm->get('translator');
        $action = '/admin/user/insert';
        $inputFilter = $sm->get('backendInsertFormFilterFactory-jbig3user');

        $srv = new InsertForm($name, $translator, $action, $inputFilter);

        return $srv;
    }


}