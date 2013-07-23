<?php

namespace Jbig3Resource\General\Module;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection,
    Doctrine\Common\Collections\Collection;

use Jbig3Resource\General\Base\BaseResourceEntityAbstract;

/**
 * @ORM\Entity
 * @ORM\Table(name="resource_module")
 */
class ModuleEntity extends BaseResourceEntityAbstract
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