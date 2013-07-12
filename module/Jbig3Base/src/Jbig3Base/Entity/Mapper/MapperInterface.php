<?php

namespace Jbig3Base\Entity\Mapper;

interface MapperInterface
{
    public function findBy($field, $email);
    public function insert($user);
    public function update($entity, $field, $value);
    public function persist($entity);
}
