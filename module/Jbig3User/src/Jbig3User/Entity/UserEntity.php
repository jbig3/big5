<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Gregory
 * Date: 20.05.13
 * Time: 13:27
 * To change this template use File | Settings | File Templates.
 */

namespace Jbig3User\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *     name="user")
 * @ORM\HasLifecycleCallbacks
 */
class UserEntity implements UserEntityInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $surname;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $password;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $registerDate;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    protected $activate;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $isActive;

    public function getId()
    {
        return $this->id;
    }

    public function getFirstname(){
        return $this->firstname;
    }

    public function setFirstname($firstname){
        $this->firstname = $firstname;
    }

    public function getSurname(){
        return $this->surname;
    }

    public function setSurname($surname){
        $this->surname = $surname;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getRegisterDate(){
        return $this->registerDate;
    }

    public function setRegisterDate($registerDate){
        $this->registerDate = $registerDate;
    }

    public function getActivate(){
        return $this->activate;
    }

    public function setActivate($activate){
        $this->activate = $activate;
    }

    public function getIsActive(){
        return $this->isActive;
    }

    public function setIsActive($isActive){
        $this->isActive = $isActive;
    }
}
