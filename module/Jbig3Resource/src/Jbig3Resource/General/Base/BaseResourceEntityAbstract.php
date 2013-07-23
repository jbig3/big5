<?php

namespace Jbig3Resource\General\Base;

use Doctrine\ORM\Mapping as ORM;

use Jbig3Base\Entity\BaseEntityAbstract;


abstract class BaseResourceEntityAbstract extends BaseEntityAbstract
{

    /**
     * @ORM\Column(type="string",length=50)
     */
    protected $name;

    /**
     * @ORM\Column(type="string",length=255)
     */
    protected $description;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $isActive;

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function getIsActive(){
        return $this->isActive;
    }

    public function setIsActive($isActive){
        $this->isActive = $isActive;
    }

}