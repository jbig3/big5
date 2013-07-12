<?php


namespace Jbig3User\Entity;


/**
 * @author Gregory
 * @version 1.0
 * @created 03-Jun-2013 05:53:26
 */
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