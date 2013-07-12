<?php


namespace Jbig3Base\Service;

use Zend\ServiceManager\ServiceManager,
    Zend\Stdlib\Hydrator\ClassMethods;

use Jbig3Base\EventManager\EventProvider;

class BaseService extends EventProvider
{

    protected $formHydrator;

    public function getFormHydrator()
    {
        return $this->formHydrator;
    }

    public function setFormHydrator(ClassMethods $formHydrator)
    {
        $this->formHydrator = $formHydrator;
        return $this;
    }

}