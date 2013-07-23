<?php
namespace Jbig3Tryings\Crud\OneToMany\ObjectSelect;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection,
    Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="test_module")
 */
class CrudOtmObjectSelectModuleEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    protected $name;

    /**
     * @ORM\Column(type="string",length=50)
     */
    protected $description;

    /**
     * @ORM\OneToMany(targetEntity="Jbig3Tryings\Crud\OneToMany\ObjectSelect\CrudOtmObjectSelectControllerEntity", mappedBy="module", cascade={"all"})
     */
    protected $controllers;


    public function __construct()
    {
        $this->controllers = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
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