<?php
namespace Jbig3Tryings\Crud\OneToMany\Collection;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection,
    Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="test_user")
 */
class CrudOtmCollectionUserEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    protected $email;

    /**
     * @ORM\Column(type="string",length=50)
     */
    protected $name;

    /**
     * @ORM\OneToMany(targetEntity="Jbig3Tryings\Crud\OneToMany\Collection\CrudOtmCollectionUserAddressEntity", mappedBy="user", cascade={"all"})
     */
    protected $userAddresses;


    public function __construct()
    {
        $this->userAddresses = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getUserAddresses()
    {
        return $this->userAddresses;
    }

    public function addUserAddresses(Collection $userAddresses)
    {
        foreach ($userAddresses as $userAddress) {
            $userAddress->setUser($this);
            $this->userAddresses->add($userAddress);
        }
    }

    public function removeUserAddresses(Collection $userAddresses)
    {
        foreach ($userAddresses as $userAddress) {
            $userAddress->setUser(null);
            $this->userAddresses->removeElement($userAddress);
        }
    }




}