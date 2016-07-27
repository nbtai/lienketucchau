<?php

namespace Tainb\Bundle\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Blog
 *
 * @ORM\Table(name="blog")
 * @ORM\Entity(repositoryClass="Tainb\Bundle\BlogBundle\Repository\BlogRepository")
 */
class Blog
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    protected $content;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set content
     *
     * @param \text $content
     *
     * @return Blog
     */
    public function setContent(\text $content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return \text
     */
    public function getContent()
    {
        return $this->content;
    }
}
