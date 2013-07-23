<?php

namespace Jbig3Resource\General\Controller;

use Doctrine\ORM\Mapping as ORM;

use Jbig3Resource\General\Base\BaseResourceEntityAbstract,
    Jbig3Resource\General\Module\ModuleEntity as ModuleEntityObj;

/**
 * @ORM\Entity
 * @ORM\Table(name="resource_controller")
 */

class ControllerEntity extends BaseResourceEntityAbstract
{
    /**
     * @ORM\ManyToOne(targetEntity="Jbig3Resource\General\Module\ModuleEntity", inversedBy="controllers")
     */
    protected $module;

    public function getModule(){
        return $this->module;
    }

    public function setModule(ModuleEntityObj $module = null){
        $this->module = $module;
    }
}