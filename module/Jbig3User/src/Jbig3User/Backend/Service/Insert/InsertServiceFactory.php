<?php
namespace Jbig3User\Backend\Service\Insert;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Jbig3User\Backend\Service\Insert\InsertService;

class InsertServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $formHydrator =  $sm->get('hydrator-jbig3base');
        $passwordBcrypt = $sm->get('bcrypt-jbig3base');
        $userEntity = $sm->get('generalUserEntity-jbig3user');
        $insertForm = $sm->get('backendInsertFormFactory-jbig3user');
        $userMapper = $sm->get('generalUserMapperFactory-jbig3user');


        $srv = new InsertService();

        $srv->setFormHydrator($formHydrator);
        $srv->setPasswordBcrypt($passwordBcrypt);
        $srv->setEntityObj($userEntity);
        $srv->setFormObj($insertForm);
        $srv->setMapperObj($userMapper);

        return $srv;
    }
}