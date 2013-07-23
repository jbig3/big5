<?php
namespace Jbig3User\Backend\Service\Role\Read;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Jbig3User\Backend\Service\Role\Read\ReadService;

class ReadServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $roleMapperObj = $sm->get('generalRoleMapperFactory-jbig3user');

        $srv = new ReadService();

        $srv->setMapperObj($roleMapperObj);

        return $srv;
    }
}