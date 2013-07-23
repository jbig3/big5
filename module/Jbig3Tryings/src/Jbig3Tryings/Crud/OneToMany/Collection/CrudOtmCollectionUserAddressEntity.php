<?php
namespace Jbig3Tryings\Crud\OneToMany\Collection;

use Doctrine\ORM\Mapping as ORM;

use Jbig3Tryings\Crud\OneToMany\Collection\CrudOtmCollectionUserEntity as CrudOtmCollectionUserEntityObj;

/**
 * @ORM\Entity
 * @ORM\Table(name="test_useraddress")
 */
class CrudOtmCollectionUserAddressEntity
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
    protected  $street;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $streetNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $zipcode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $city;

    /**
     * @ORM\ManyToOne(targetEntity="Jbig3Tryings\Crud\OneToMany\Collection\CrudOtmCollectionUserEntity", inversedBy="userAddresses")
     */
    protected $user;

    public function getId()
    {
        return $this->id;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function setStreet($street)
    {
        $this->street = $street;
    }

    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;
    }

    public function getZipcode()
    {
        return $this->zipcode;
    }

    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser(CrudOtmCollectionUserEntityObj $user = null)
    {
        $this->user = $user;
    }
}