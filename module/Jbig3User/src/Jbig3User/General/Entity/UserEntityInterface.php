<?php

namespace Jbig3User\General\Entity;

interface UserEntityInterface
{
    public function getId();

    public function getFirstname();

    public function setFirstname($firstname);

    public function getSurname();

    public function setSurname($surname);

    public function getEmail();

    public function setEmail($email);

    public function getPassword();

    public function setPassword($password);

    public function getRegisterDate();

    public function setRegisterDate($registerDate);

    public function getActivate();

    public function setActivate($activate);
}