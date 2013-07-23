<?php
namespace Jbig3User\Backend\Form\Role\Insert;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Debug\Debug;

use Jbig3User\Backend\Form\Role\Insert\InsertForm;

class InsertFormFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $name = 'insert';
        $translator = $sm->get('translator');
        $action = '/admin/role/insert';
        $inputFilter = $sm->get('backendRoleInsertFormFilterFactory-jbig3user');

        $srv = new InsertForm($name, $translator, $action, $inputFilter);

        return $srv;
    }


}