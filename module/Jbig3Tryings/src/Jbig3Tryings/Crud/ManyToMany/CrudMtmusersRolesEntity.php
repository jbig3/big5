<?php

namespace Jbig3Tryings\Crud\ManyToMany;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection,
    Doctrine\Common\Collections\Collection;

use Jbig3Base\Entity\BaseEntityAbstract;

/**
 * @ORM\Entity
 * @ORM\Table(name="tryings_users_roles")
 */
class CrudMtmUsersRolesEntity extends BaseEntityAbstract
{

    /**
     * @ORM\ManyToOne(targetEntity="CrudMtmUserEntity", inversedBy="roles")
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="CrudMtmRoleEntity", inversedBy="users")
     */
    protected $role;

    public function getUser()
    {
        return $this->user;
    }

    public function setUser(CrudMtmUserEntity $user = null)
    {
        $this->user = $user;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole(CrudMtmRoleEntity $role = null)
    {
        $this->role = $role;
    }
}