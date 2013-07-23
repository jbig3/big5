<?php
namespace Jbig3User\General\Entity;

use Doctrine\ORM\Mapping as ORM, 
    Doctrine\Common\Collections\ArrayCollection;

use Jbig3Base\Entity\BaseEntityAbstract;

/**
 *
 * @ORM\Table(name="rule")
 */

class RuleEntity extends BaseEntityAbstract {

    /**
     * @ORM\Column(type="boolean")
     */
    protected $isAllowed;


    /**
     * @ORM\ManyToOne(targetEntity="RoleEntity")
     */
    protected $roles;

    public function __construct(){

         $this->roles = new ArrayCollection();
    }

    public function getIsAllowed(){
        return $this->isAllowed;
    }

    public function setIsAllowed($isAllowed){
        $this->isAllowed = $isAllowed;
    }

    public function getResourceActions(){
        return $this->resourceActions;
    }

    public function setResourceActions($resourceActions){
        $this->resourceActions = $resourceActions;
    }

    public function getRoles(){
        return $this->roles;
    }

    public function setRoles($roles){
        $this->roles = $roles;
    }

}