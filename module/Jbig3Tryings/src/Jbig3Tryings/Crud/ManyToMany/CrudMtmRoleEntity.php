<?php

namespace Jbig3Tryings\Crud\ManyToMany;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection,
    Doctrine\Common\Collections\Collection;

use Jbig3Base\Entity\BaseEntityAbstract;

/**
 * @ORM\Entity
 * @ORM\Table(name="tryings_role")
 */
class CrudMtmRoleEntity extends BaseEntityAbstract{

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\OneToMany(targetEntity="CrudMtmUsersRolesEntity", mappedBy="role", cascade={"all"})
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

    public function addUsers(Collection $users)
    {
        foreach ($users as $user) {
            $user->setRoles($this);
            $this->users->add($user);
        }
    }

    public function removeUsers(Collection $users)
    {
        foreach ($users as $user) {
            $user->setRoles(null);
            $this->users->removeElement($user);
        }
    }
}