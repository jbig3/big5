<?php

namespace Jbig3Base\Entity\Mapper;

use Doctrine\ORM\EntityManager;

use Zend\Debug\Debug;

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

    public function findAll()
    {
        $entity = $this->em->getRepository($this->entity)->findAll();
        return $entity;
    }

    public function findOneBy($field, $value)
    {
        $er = $this->em->getRepository($this->entity)->findOneBy(array($field => $value));
        return $er;
    }

    public function remove($entityObj)
    {
            $this->em->remove($entityObj);
            $this->em->flush();
    }


    public function persist($entity)
    {
        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }
}