<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Gregory
 * Date: 15.06.13
 * Time: 10:50
 * To change this template use File | Settings | File Templates.
 */
namespace Jbig3User\Service\Activate;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;
use Jbig3User\Service\Activate\ActivateService;

class ActivateServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $formHydrator =  $sm->get('hydrator-jbig3base');
        $userEntity = $sm->get('userEntity-jbig3user');
        $activateForm = $sm->get('activateFormFactory-jbig3user');
        $userMapper = $sm->get('userMapperFactory-jbig3user');


        $srv = new ActivateService();

        $srv->setFormHydrator($formHydrator);
        $srv->setUserEntity($userEntity);
        $srv->setForm($activateForm);
        $srv->setUserMapper($userMapper);

        return $srv;
    }
}