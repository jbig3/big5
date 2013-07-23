<?php
namespace Jbig3User\General\Form\Validator;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Debug\Debug;

use Jbig3Base\Form\Validator\RecordExistsValidator;

class EmailRecordExistsFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $field = 'email';
        $userMapperFactory = $sm->get('generalUserMapperFactory-jbig3user');

        $srv = new RecordExistsValidator();

        $srv->setMapper($userMapperFactory);
        $srv->setField($field);

        return $srv;
    }


}