<?php
namespace Jbig3User\Entity\Mapper;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface,
    Zend\Debug\Debug;

use Jbig3Base\Entity\Mapper\BaseMapper;

class UserMapperFactory implements FactoryInterface
{
	public function createService(ServiceLocatorInterface $sm)
    {
        $em = $sm->get('jbig3-em');
        $entity = '\Jbig3User\Entity\UserEntity';

        $srv = new BaseMapper($entity, $em);

        return $srv;
    }
}