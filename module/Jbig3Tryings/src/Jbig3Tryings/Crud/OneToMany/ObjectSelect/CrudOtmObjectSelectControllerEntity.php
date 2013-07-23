<?php
namespace Jbig3Tryings\Crud\OneToMany\ObjectSelect;

use Doctrine\ORM\Mapping as ORM;

use Jbig3Tryings\Crud\OneToMany\ObjectSelect\CrudOtmObjectSelectModuleEntity as CrudOtmObjectSelectModuleEntityObj;

/**
 * @ORM\Entity
 * @ORM\Table(name="test_controller")
 */
class CrudOtmObjectSelectControllerEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected  $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $description;

    /**
     * @ORM\ManyToOne(targetEntity="Jbig3Tryings\Crud\OneToMany\ObjectSelect\CrudOtmObjectSelectModuleEntity", inversedBy="controllers")
     */
    protected $module;

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

    public function getModule()
    {
        return $this->module;
    }

    public function setModule(CrudOtmObjectSelectModuleEntityObj $module = null)
    {
        $this->module = $module;
    }
}