<?php
namespace Jbig3User\General\Form\Validator;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Debug\Debug;

use Jbig3Base\Form\Validator\RecordExistsValidator;

class RoleRecordExistsFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $field = 'name';
        $roleMapperFactory = $sm->get('generalRoleMapperFactory-jbig3user');

        $srv = new RecordExistsValidator();

        $srv->setMapper($roleMapperFactory);
        $srv->setField($field);

        return $srv;
    }


}