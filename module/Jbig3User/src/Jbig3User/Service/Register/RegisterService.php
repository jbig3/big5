<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Gregory
 * Date: 15.06.13
 * Time: 07:10
 * To change this template use File | Settings | File Templates.
 */
namespace Jbig3User\Service\Register;

use Jbig3User\Service\UserService;
use Zend\Form\Form,
    Zend\Crypt\Password\Bcrypt;
use DateTime;

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
        $user = $this->getUserEntity();
        $form = $this->getForm();
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

        $this->getUserMapper()->insert($user);

        $this->getEventManager()->trigger(self::EVENT_REGISTER, $this);

        return $user;
    }

    public function cryptPassword($user)
    {
        $user->setPassword($this->passwordBcrypt->create($user->getPassword()));
        return $user;
    }

    public function setRegisterDate($registerDate){
        $this->userEntity->setRegisterDate($registerDate);
    }

    public function setActivate($activate){
        $this->userEntity->setActivate($activate);
    }

    public function setIsActive($isActive){
        $this->userEntity->setIsActive($isActive);
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


    public function getRegisterForm()
    {
        return $this->registerForm;
    }

    public function setRegisterForm(Form $registerForm)
    {
        $this->registerForm = $registerForm;
        return $this;
    }
}