<?php

namespace Jbig3Base\Entity\Mapper;

use Doctrine\ORM\EntityManager;
use Zend\Stdlib\Hydrator\HydratorInterface,
    Zend\Debug\Debug;

class BaseMapper implements MapperInterface
{

    // weitere Methoden: http://www.zendexperts.com/tag/zf2/
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;
    protected $entity;

    public function __construct($entity, EntityManager $em = null)
    {
        $this->em = $em;
        $this->entity = $entity;
    }

    public function findBy($field, $value)
    {
        $er = $this->em->getRepository($this->entity)->findOneBy(array($field => $value));
        return $er;
    }

    public function insert($entity)
    {
        return $this->persist($entity);
    }

    public function update($entity, $field, $value)
    {
        $entity = $this->findBy($field, $value);
        $entity->setIsActive(1);
        return $this->persist($entity);
    }

    public function persist($entity)
    {
        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }
}