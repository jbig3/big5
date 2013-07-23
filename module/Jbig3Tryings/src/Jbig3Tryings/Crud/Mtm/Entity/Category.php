<?php

namespace Jbig3Tryings\Crud\Mtm\Entity;

use \DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="categories", uniqueConstraints={@ORM\UniqueConstraint(name="name_idx", columns={"name"}), @ORM\UniqueConstraint(name="slug_idx", columns={"slug"})}, indexes={@ORM\Index(name="creationDate_idx", columns={"creationDate"})})
 * @ORM\Entity
 */
class Category
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $creationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $slug;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SxBlog\Entity\Post", inversedBy="categories")
     * @ORM\JoinTable(name="posts_categories",
     *   joinColumns={
     *     @ORM\JoinColumn(name="category_id", referencedColumnName="id", onDelete="CASCADE")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="post_id", referencedColumnName="id", onDelete="CASCADE")
     *   }
     * )
     */
    private $posts;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->posts        = new \Doctrine\Common\Collections\ArrayCollection();
        $this->creationDate = new DateTime;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     * @return Category
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Category
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Add posts
     *
     * @param \Jbig3Tryings\Crud\Mtm\Entity\Post $posts
     * @return Category
     */
    public function addPost(Post $posts)
    {
        if ($this->posts->contains($posts)) {
            return;
        }

        $this->posts->add($posts);
        $posts->addCategory($this);

        return $this;
    }

    /**
     * Remove posts
     *
     * @param \Jbig3Tryings\Crud\Mtm\Entity\Post $posts
     */
    public function removePost(Post $posts)
    {
        if (!$this->posts->contains($posts)) {
            return;
        }

        $this->posts->removeElement($posts);

    }

    /**
     * Get posts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPosts()
    {
        return $this->posts;
    }
}
