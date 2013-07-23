<?php
namespace Jbig3User\Backend\Form\Insert;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Debug\Debug;

use Jbig3User\Backend\Form\Insert\InsertFormFilter;

class InsertFormFilterFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $emailRecordExistsValidator = $sm->get('generalEmailRecordExistsFactory-jbig3user');

        $srv = new InsertFormFilter($emailRecordExistsValidator, null);

        return $srv;
    }


}