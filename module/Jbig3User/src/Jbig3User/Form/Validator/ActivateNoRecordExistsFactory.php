<?php
namespace Jbig3User\Form\Validator;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface,
    Zend\Debug\Debug;

use Jbig3Base\Form\Validator\NoRecordExistsValidator;

class ActivateNoRecordExistsFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $userMapperFactory = $sm->get('userMapperFactory-jbig3user');
        $field = 'activate';

        $srv = new NoRecordExistsValidator();

        $srv->setMapper($userMapperFactory);
        $srv->setField($field);

        return $srv;
    }


}