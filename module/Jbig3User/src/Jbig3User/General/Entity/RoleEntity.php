<?php

namespace Jbig3User\General\Entity;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection;

use Jbig3Base\Entity\BaseEntityAbstract;

/**
 * @ORM\Entity
 * @ORM\Table(name="role")
 */
class RoleEntity extends BaseEntityAbstract{

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\ManyToMany(targetEntity="UserEntity", mappedBy="roles")
     *
     */
    protected $users;

    public function __construct(){
        $this->users = new ArrayCollection();
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getUsers(){
        return $this->users;
    }

    public function setUsers($users){
        $this->users = $users;
    }
}