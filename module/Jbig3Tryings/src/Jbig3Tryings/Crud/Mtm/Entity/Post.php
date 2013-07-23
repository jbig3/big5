<?php

namespace Jbig3Tryings\Crud\Mtm\Entity;

use \DateTime;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Post
 *
 * @ORM\Table(
 *      name="posts",
 *      indexes={
 *          @ORM\Index(name="title_idx", columns={"title"}),
 *          @ORM\Index(name="creationDate_idx", columns={"creationDate"}),
 *          @ORM\Index(name="slug_idx", columns={"slug"})
 *      }
 * )
 * @ORM\Entity
 */
class Post
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
     * @ORM\Column(name="title", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $body;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $slug;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SxBlog\Entity\Category", mappedBy="posts")
     */
    private $categories;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories   = new ArrayCollection();
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
     * @return Post
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
     * Set title
     *
     * @param string $title
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return Post
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Post
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
     * Add categories
     *
     * @param \Jbig3Tryings\Crud\Mtm\Entity\Category $categories
     * @return Post
     */
    public function addCategories(Collection $categories)
    {
        if ($categories instanceof Category) {
            return $this->addCategory($categories);
        }

        foreach ($categories as $category) {
            $this->addCategory($category);
        }

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \Jbig3Tryings\Crud\Mtm\Entity\Category $categories
     */
    public function removeCategories($categories)
    {
        if ($categories instanceof Category) {
            return $this->removeCategory($categories);
        }

        foreach ($categories as $category) {
            $this->removeCategory($category);
        }

        return $this;
    }

    /**
     * Add categories
     *
     * @param \Jbig3Tryings\Crud\Mtm\Entity\Category $categories
     * @return Post
     */
    public function addCategory(Category $category)
    {
        if ($this->categories->contains($category)) {
            return;
        }

        $this->categories->add($category);
        $category->addPost($this);

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \Jbig3Tryings\Crud\Mtm\Entity\Category $categories
     */
    public function removeCategory(Category $category)
    {
        if (!$this->categories->contains($category)) {
            return;
        }

        $this->categories->removeElement($category);

    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }
}
