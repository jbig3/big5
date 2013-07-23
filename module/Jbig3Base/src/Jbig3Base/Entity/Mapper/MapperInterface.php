<?php

namespace Jbig3Base\Entity\Mapper;

interface MapperInterface
{
    public function findOneBy($field, $email);
    public function persist($entity);
}
