<?php
namespace Jbig3User\Backend\Form\Role\Insert;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Debug\Debug;

use Jbig3User\Backend\Form\Role\Insert\InsertFormFilter;

class InsertFormFilterFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $roleRecordExistsValidator = $sm->get('generalRoleRecordExistsFactory-jbig3user');

        $srv = new InsertFormFilter($roleRecordExistsValidator, null);

        return $srv;
    }


}