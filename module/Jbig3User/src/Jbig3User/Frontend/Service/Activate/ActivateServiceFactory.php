<?php

namespace Jbig3User\Frontend\Service\Activate;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Jbig3User\Frontend\Service\Activate\ActivateService;

class ActivateServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $formHydrator =  $sm->get('hydrator-jbig3base');
        $userEntity = $sm->get('generalUserEntity-jbig3user');
        $activateForm = $sm->get('frontendActivateFormFactory-jbig3user');
        $userMapper = $sm->get('generalUserMapperFactory-jbig3user');


        $srv = new ActivateService();

        $srv->setFormHydrator($formHydrator);
        $srv->setEntityObj($userEntity);
        $srv->setFormObj($activateForm);
        $srv->setMapperObj($userMapper);

        return $srv;
    }
}