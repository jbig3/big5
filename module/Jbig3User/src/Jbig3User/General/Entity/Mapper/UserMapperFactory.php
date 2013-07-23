<?php
namespace Jbig3User\General\Entity\Mapper;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Debug\Debug;

use Jbig3Base\Entity\Mapper\BaseMapper;

class UserMapperFactory implements FactoryInterface
{
	public function createService(ServiceLocatorInterface $sm)
    {
        $em = $sm->get('jbig3-em');
        $entity = '\Jbig3User\General\Entity\UserEntity';

        $srv = new BaseMapper($entity, $em);

        return $srv;
    }
}