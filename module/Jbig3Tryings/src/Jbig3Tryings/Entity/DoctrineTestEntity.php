<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Gregory
 * Date: 20.05.13
 * Time: 13:27
 * To change this template use File | Settings | File Templates.
 */

namespace Jbig3Tryings\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(
 *     repositoryClass="Jbig3Tryings\Entity\Repository\DoctrineTestRepository")
 * @ORM\Table(
 *     name="doctrinetest")
 * @ORM\HasLifecycleCallbacks
 */

class DoctrineTestEntity
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(
     *      strategy="IDENTITY")
     * @ORM\Column(
     *      name="id",
     *      type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(
     *     name="name",
     *     type="string",
     *     length=50,
     *     unique=true)
     */
    protected $name;

    /**
     * @ORM\Column(
     *     name="decimal",
     *     type="decimal",
     *     precision=4,
     *     scale=2,
     *     nullable=true)
     */
    protected $decimal;

    /**
     * @ORM\Column(
     *     name="float",
     *     type="float",
     *     precision=2,
     *     scale=4,
     *     nullable=true)
     */
    protected $float;

    /**
     * @ORM\Column(
     *     name="date",
     *     type="date")
     */
    protected $date;

    /**
     * @ORM\Column(
     *     name="time",
     *     type="time")
     */
    protected $time;

    /**
     * @ORM\Column(
     *     name="datetime",
     *     type="datetime")
     */
    protected $datetime;

    /**
     * @ORM\Column(
     *     name="text",
     *     type="text",
     *     length=500)
     */
    protected $text;

    /**
     * @ORM\Column(
     *     name="boolean",
     *     type="boolean")
     */
    protected $boolean;

    public function getId()
    {
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getDecimal()
    {
        return $this->decimal;
    }

    public function setDecimal($decimal)
    {
        $this->decimal = $decimal;
    }

    public function getFloat()
    {
        return $this->float;
    }

    public function setFloat($float)
    {
        $this->float = $float;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function setTime($time)
    {
        $this->time = $time;
    }

    public function getDatetime()
    {
        return $this->datetime;
    }

    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getBoolean()
    {
        return $this->boolean;
    }

    public function setBoolean($boolean)
    {
        $this->boolean = $boolean;
    }
}
