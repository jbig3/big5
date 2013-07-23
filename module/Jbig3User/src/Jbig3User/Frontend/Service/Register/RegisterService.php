<?php

namespace Jbig3User\Frontend\Service\Register;

use Zend\Crypt\Password\Bcrypt;
use DateTime;

use Jbig3User\General\Service\UserService;

class RegisterService extends UserService
{
    const BCRYPT_COST = 14;
    const BCRYPT_SALT = 'einAnfangIstGemachtAberDerRestBleibt';
    const EVENT_REGISTER   = 'register';
    const IS_ACTIVE = 0;

    protected $passwordBcrypt;
    protected $registerForm;


    public function register(array $data)
    {
        $user = $this->getEntityObj();
        $form = $this->getFormObj();
        $form->setHydrator($this->getFormHydrator());
        $form->bind($user);
        $form->setData($data);

        if (!$form->isValid()) {
            return false;
        }

        $user = $this->cryptPassword($form->getData());

        // TODO: das geht so nicht!
        $this->setRegisterDate(new DateTime());
        $this->setActivate(uniqid());
        $this->setIsActive(self::IS_ACTIVE);

        $this->getMapperObj()->insert($user);

        $this->getEventManager()->trigger(self::EVENT_REGISTER, $this);

        return $user;
    }

    public function cryptPassword($user)
    {
        $user->setPassword($this->passwordBcrypt->create($user->getPassword()));
        return $user;
    }

    public function setRegisterDate($registerDate){
        $this->entityObj->setRegisterDate($registerDate);
    }

    public function setActivate($activate){
        $this->entityObj->setActivate($activate);
    }

    public function setIsActive($isActive){
        $this->entityObj->setIsActive($isActive);
    }

    public function getPasswordBcrypt()
    {
        return $this->passwordBcrypt;
    }

    public function setPasswordBcrypt(Bcrypt $passwordBcrypt)
    {
        $passwordBcrypt->setSalt(self::BCRYPT_SALT);
        $passwordBcrypt->setCost(self::BCRYPT_COST);

        $this->passwordBcrypt = $passwordBcrypt;

        return $this;
    }
}