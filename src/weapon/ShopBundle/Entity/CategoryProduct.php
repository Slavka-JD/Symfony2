<?php

namespace weapon\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * CategoryProduct
 *
 * @ORM\Table(name="CategoryProduct")
 * @ORM\Entity
 */
class CategoryProduct
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var integer
     *
     * @ORM\Column(name="totalProducts", type="integer", nullable=true)
     */
    private $totalProducts;

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
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return CategoryProduct
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * Set slug
     *
     * @param string $slug
     * @return CategoryProduct
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * Get totalProducts
     *
     * @return integer
     */
    public function getTotalProducts()
    {
        return $this->totalProducts;
    }

    /**
     * Set totalProducts
     *
     * @param integer $totalProducts
     * @return CategoryProduct
     */
    public function setTotalProducts($totalProducts)
    {
        $this->totalProducts = $totalProducts;
        return $this;
    }
}