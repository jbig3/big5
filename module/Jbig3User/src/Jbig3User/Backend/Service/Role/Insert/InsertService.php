<?php
namespace Jbig3User\Backend\Service\Role\Insert;

use Zend\Form\Form,
    Zend\Crypt\Password\Bcrypt;

use Jbig3User\General\Service\UserService;

class InsertService extends UserService
{

    const EVENT_ROLE_INSERT   = 'roleInsert';

    protected $insertForm;


    public function insert(array $data)
    {
        $entity = $this->getEntityObj();
        $form = $this->getFormObj();
        $form->setHydrator($this->getFormHydrator());
        $form->bind($entity);
        $form->setData($data);

        if (!$form->isValid()) {
            return false;
        }

        $this->getMapperObj()->insert($entity);

        $this->getEventManager()->trigger(self::EVENT_ROLE_INSERT, $this);

        return $entity;
    }
}