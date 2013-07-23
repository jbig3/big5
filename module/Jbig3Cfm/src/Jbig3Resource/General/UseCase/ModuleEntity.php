<?php

namespace Jbig3Cfm\General\UseCase;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection,
    Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="cfm_useCase")
 */
class ModuleEntity
{
    /**
     * @ORM\OneToMany(targetEntity="Jbig3Resource\General\Controller\ControllerEntity", mappedBy="module", cascade={"persist"})
     */
    protected $controllers;

    public function __construct()
    {
        $this->controllers = new ArrayCollection();
    }

    public function getControllers()
    {
        return $this->controllers;
    }

    public function addControllers(Collection $controllers)
    {
        foreach ($controllers as $controller) {
            $controller->setModule($this);
            $this->controllers->add($controller);
        }
    }

    public function removeControllers(Collection $controllers)
    {
        foreach ($controllers as $controller) {
            $controller->setModule(null);
            $this->controllers->removeElement($controller);
        }
    }


}