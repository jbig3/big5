<?php


namespace Jbig3Base\Service;

use Zend\ServiceManager\ServiceManager,
    Zend\Form\Form;

use Jbig3Base\EventManager\EventProvider,
    Jbig3Base\Entity\Mapper\MapperInterface;

abstract class BaseServiceAbstract extends EventProvider
{

    protected $entityObj;
    protected $currentEntityObj;
    protected $formObj;
    protected $mapperObj;
    protected $event;

    public function __construct(
        $entityObj,
        $formObj,
        $mapperObj)
    {
        $this->setEntityObj($entityObj);
        $this->setFormObj($formObj);
        $this->setMapperObj($mapperObj);
    }

    public function getFormObj($entityObj = null)
    {
        if($entityObj){
            $this->formObj->bind($entityObj);
        }
        return $this->formObj;
    }

    public function setFormObj($form)
    {
        $this->formObj = $form;
        return $this;
    }

    public function getEntityObj($field = null, $value = null)
    {
        if($field && $value){
            $this->entityObj = $this->getMapperObj()->findOneBy($field, $value);
        }
        return $this->entityObj;
    }

    public function setEntityObj($entity)
    {
        $this->entityObj = $entity;
        return $this;
    }

    public function getCurrentEntityObj()
    {
        return $this->currentEntityObj;
    }

    public function setCurrentEntityObj($field = 'id')
    {
        $value = $this->params($field);
        $entityObj = $this->getMapperObj()->findOneBy(array($field => $value));

        return $entityObj;
    }

    public function getMapperObj()
    {
        return $this->mapperObj;
    }

    public function setMapperObj(MapperInterface $userMapperObj)
    {
        $this->mapperObj = $userMapperObj;
        return $this;
    }

    public function getEvent()
    {
        return $this->event;
    }

    public function setEvent($event)
    {
        $this->event = $this->getEventManager()->trigger($event, $this);
    }




}