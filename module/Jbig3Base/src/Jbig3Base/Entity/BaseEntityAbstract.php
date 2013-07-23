<?php

namespace Jbig3Base\Entity;

use Doctrine\ORM\Mapping as ORM;


abstract class BaseEntityAbstract
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    public function getId()
    {
        return $this->id;
    }
}