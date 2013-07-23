<?php
namespace Jbig3Resource\General\Controller;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Jbig3Base\Entity\Mapper\BaseMapper;

class ControllerMapperFactory implements FactoryInterface
{
	public function createService(ServiceLocatorInterface $sm)
    {
        $em = $sm->get('jbig3-em');
        $mapperEntityFqcn = '\Jbig3Resource\General\Controller\ControllerEntity';

        $srv = new BaseMapper($mapperEntityFqcn, $em);

        return $srv;
    }
}