<?php
namespace Jbig3User\Form\Validator;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface,
    Zend\Debug\Debug;

use Jbig3Base\Form\Validator\RecordExistsValidator;

class EmailRecordExistsFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $field = 'email';
        $userMapperFactory = $sm->get('userMapperFactory-jbig3user');

        $srv = new RecordExistsValidator();

        $srv->setMapper($userMapperFactory);
        $srv->setField($field);

        return $srv;
    }


}