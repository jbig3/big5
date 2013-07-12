<?php

namespace Jbig3User\Service;

use Jbig3Base\Service\BaseService,
    Jbig3User\Entity\UserEntityInterface,
    Jbig3Base\Entity\Mapper\MapperInterface;

use Zend\Form\Form;

class UserService extends BaseService
{
    protected $form;
    protected $userEntity;
    protected $userMapper;

    public function getForm()
    {
        return $this->form;
    }

    public function setForm(Form $form)
    {
        $this->form = $form;
        return $this;
    }

    public function getUserEntity()
    {
        return $this->userEntity;
    }

    public function setUserEntity(UserEntityInterface $userEntity)
    {
        $this->userEntity = $userEntity;
        return $this;
    }

    public function getUserMapper()
    {
        return $this->userMapper;
    }

    public function setUserMapper(MapperInterface $userMapper)
    {
        $this->userMapper = $userMapper;
        return $this;
    }


}