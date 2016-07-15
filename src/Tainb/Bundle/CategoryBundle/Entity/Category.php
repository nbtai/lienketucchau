<?php

namespace Tainb\Bundle\CategoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="Tainb\Bundle\CategoryBundle\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Tainb\Bundle\BlogBundle\Entity\Blog", mappedBy="category")
     */
    private $blogs;

    /**
     * @ORM\Column(type="datetime", name="createdAt", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", name="updatedAt", nullable=true)
     */
    private $updatedAt;


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
     * Set name
     *
     * @param string $name
     *
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Category
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Category
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->blogs = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Add blog
     *
     * @param \Tainb\Bundle\BlogBundle\Entity\Blog $blog
     *
     * @return Category
     */
    public function addBlog(\Tainb\Bundle\BlogBundle\Entity\Blog $blog)
    {
        $this->blogs[] = $blog;

        return $this;
    }

    /**
     * Remove blog
     *
     * @param \Tainb\Bundle\BlogBundle\Entity\Blog $blog
     */
    public function removeBlog(\Tainb\Bundle\BlogBundle\Entity\Blog $blog)
    {
        $this->blogs->removeElement($blog);
    }

    /**
     * Get blogs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBlogs()
    {
        return $this->blogs;
    }
}
