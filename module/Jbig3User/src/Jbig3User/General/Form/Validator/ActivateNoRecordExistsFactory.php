<?php
namespace Jbig3User\General\Form\Validator;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Debug\Debug;

use Jbig3Base\Form\Validator\NoRecordExistsValidator;

class ActivateNoRecordExistsFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $sm)
    {
        $userMapperFactory = $sm->get('generalUserMapperFactory-jbig3user');
        $field = 'activate';

        $srv = new NoRecordExistsValidator();

        $srv->setMapper($userMapperFactory);
        $srv->setField($field);

        return $srv;
    }


}