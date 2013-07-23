<?php
namespace Jbig3Resource\General\Module;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Jbig3Base\Entity\Mapper\BaseMapper;

class ModuleMapperFactory implements FactoryInterface
{
	public function createService(ServiceLocatorInterface $sm)
    {
        $em = $sm->get('jbig3-em');
        $mapperEntityFqcn = '\Jbig3Resource\General\Module\ModuleEntity';

        $srv = new BaseMapper($mapperEntityFqcn, $em);

        return $srv;
    }
}