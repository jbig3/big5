<?php

namespace Jbig3Tryings\Crud\ManyToMany;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection,
    Doctrine\Common\Collections\Collection;

use Jbig3Base\Entity\BaseEntityAbstract;

/**
 * @ORM\Entity
 * @ORM\Table(name="tryings_user")
 */
class CrudMtmUserEntity extends BaseEntityAbstract
{
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $surname;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $password;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $isActive;

    /**
     * @ORM\OneToMany(targetEntity="CrudMtmUsersRolesEntity", mappedBy="user", cascade={"all"})
     */
    protected $roles;

    public function __construct(){
        $this->roles = new ArrayCollection();
    }

    public function getFirstname(){
        return $this->firstname;
    }

    public function setFirstname($firstname){
        $this->firstname = $firstname;
    }

    public function getSurname(){
        return $this->surname;
    }

    public function setSurname($surname){
        $this->surname = $surname;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getRegisterDate(){
        return $this->registerDate;
    }

    public function setRegisterDate($registerDate){
        $this->registerDate = $registerDate;
    }

    public function getActivate(){
        return $this->activate;
    }

    public function setActivate($activate){
        $this->activate = $activate;
    }

    public function getIsActive(){
        return $this->isActive;
    }

    public function setIsActive($isActive){
        $this->isActive = $isActive;
    }

    public function getRoles(){
        return $this->roles;
    }

    public function addRoles(Collection $roles)
    {
        foreach ($roles as $role) {
            $role->setUsers($this);
            $this->roles->add($role);
        }
    }

    public function removeRoles(Collection $roles)
    {
        foreach ($roles as $role) {
            $role->setUsers(null);
            $this->roles->removeElement($role);
        }
    }
}
