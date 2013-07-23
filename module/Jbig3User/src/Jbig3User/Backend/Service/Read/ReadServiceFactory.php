<?php
namespace Jbig3User\Backend\Service\Read;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Jbig3User\Backend\Service\Read\ReadService;

class ReadServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $userMapperObj = $sm->get('generalUserMapperFactory-jbig3user');

        $srv = new ReadService();

        $srv->setMapperObj($userMapperObj);

        return $srv;
    }
}