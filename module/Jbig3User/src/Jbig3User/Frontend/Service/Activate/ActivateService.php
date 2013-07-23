<?php

namespace Jbig3User\Frontend\Service\Activate;

use Jbig3User\General\Service\UserService;

class ActivateService extends UserService
{
    const EVENT_ACTIVATE = 'activate';

    protected $field;
    protected $value;


    public function activateForm(array $data)
    {
        $user = $this->getEntityObj();
        $form = $this->getFormObj();
        $form->setHydrator($this->getFormHydrator());
        $form->bind($user);
        $form->setData($data);

        $field = 'activate';
        $value = $data[$field];

        if (!$form->isValid()) {
            return false;
        }

        if ($this->checkIsActive($field, $value)) {
            return $user = 'isActive';
        }

        $this->getMapperObj()->update($user, $field, $value);

        $this->getEventManager()->trigger(self::EVENT_ACTIVATE, $this);

        return $user;
    }

    public function checkIsActive($field, $value)
    {
        $user = $this->getMapperObj()->findBy($field, $value);

        if ($user) {
            if ($user->getIsActive()) {
                return true;
            }
        }
        return false;
    }






}