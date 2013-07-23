<?php
namespace Jbig3User\Backend\Service\Role\Insert;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Jbig3User\Backend\Service\Role\Insert\InsertService;

class InsertServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $formHydrator =  $sm->get('hydrator-jbig3base');
        $roleEntity = $sm->get('generalRoleEntity-jbig3user');
        $insertForm = $sm->get('backendRoleInsertFormFactory-jbig3user');
        $roleMapper = $sm->get('generalRoleMapperFactory-jbig3user');


        $srv = new InsertService();

        $srv->setFormHydrator($formHydrator);
        $srv->setEntityObj($roleEntity);
        $srv->setFormObj($insertForm);
        $srv->setMapperObj($roleMapper);

        return $srv;
    }
}