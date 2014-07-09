<?php

namespace Boxenmieten\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="cset")
 * @ORM\Entity(repositoryClass="Boxenmieten\AppBundle\Entity\Repository\ImageRepository")
 * @UniqueEntity(fields="name")
 */
class Set
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
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $name;
    
    /**
     * @var string
     * 
     * @Gedmo\Mapping\Annotation\Slug(fields={"name"})
     * @ORM\Column(length=64, unique=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="text")
     */
    private $description;
    
    /**
     * @ORM\Column(type="text")
     */
    private $summary;
    
    /**
     * @ORM\Column(type="string")
     */
    private $descriptionFormatter;
    
    /**
     * @ORM\Column(type="text")
     */
    private $rawDescription;
    
    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $weekPrice;
    
    /**
     * @ORM\OneToMany(targetEntity="SetComponent", mappedBy="set", cascade={"persist", "remove"})
     */
    private $components;
    
    /**
     * @ORM\ManyToMany(targetEntity="Boxenmieten\AppBundle\Entity\Image", cascade={"persist", "remove"})
     */
    private $images;
    
    /**
     * @ORM\ManyToOne(targetEntity="Boxenmieten\AppBundle\Entity\Image")
     */
    private $previewImage;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->components = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString() {
        return $this->name;
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
     * Set name
     *
     * @param string $name
     * @return Set
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
     * @return Set
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
     * Set description
     *
     * @param string $description
     * @return Set
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add components
     *
     * @param \Boxenmieten\AppBundle\Entity\SetComponent $components
     * @return Set
     */
    public function addComponent(\Boxenmieten\AppBundle\Entity\SetComponent $components)
    {
        $this->components[] = $components;

        return $this;
    }

    /**
     * Remove components
     *
     * @param \Boxenmieten\AppBundle\Entity\SetComponent $components
     */
    public function removeComponent(\Boxenmieten\AppBundle\Entity\SetComponent $components)
    {
        $this->components->removeElement($components);
    }

    /**
     * Get components
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComponents()
    {
        return $this->components;
    }
    
    /**
     * Set components
     *
     * @param \Doctrine\Common\Collections\Collection 
     * @return Set
     */
    public function setComponents($components)
    {
        $this->components = $components;
    }

    /**
     * Set descriptionFormatter
     *
     * @param string $descriptionFormatter
     * @return Set
     */
    public function setDescriptionFormatter($descriptionFormatter)
    {
        $this->descriptionFormatter = $descriptionFormatter;

        return $this;
    }

    /**
     * Get descriptionFormatter
     *
     * @return string 
     */
    public function getDescriptionFormatter()
    {
        return $this->descriptionFormatter;
    }

    /**
     * Set rawDescription
     *
     * @param string $rawDescription
     * @return Set
     */
    public function setRawDescription($rawDescription)
    {
        $this->rawDescription = $rawDescription;

        return $this;
    }

    /**
     * Get rawDescription
     *
     * @return string 
     */
    public function getRawDescription()
    {
        return $this->rawDescription;
    }

    /**
     * Set weekPrice
     *
     * @param integer $weekPrice
     * @return Set
     */
    public function setWeekPrice($weekPrice)
    {
        $this->weekPrice = $weekPrice;

        return $this;
    }

    /**
     * Get weekPrice
     *
     * @return integer 
     */
    public function getWeekPrice()
    {
        return $this->weekPrice;
    }

    /**
     * Add images
     *
     * @param \Boxenmieten\AppBundle\Entity\Image $images
     * @return Set
     */
    public function addImage(\Boxenmieten\AppBundle\Entity\Image $images)
    {
        $this->images[] = $images;

        return $this;
    }

    /**
     * Remove images
     *
     * @param \Boxenmieten\AppBundle\Entity\Image $images
     */
    public function removeImage(\Boxenmieten\AppBundle\Entity\Image $images)
    {
        $this->images->removeElement($images);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set previewImage
     *
     * @param \Boxenmieten\AppBundle\Entity\Image $previewImage
     * @return Set
     */
    public function setPreviewImage(\Boxenmieten\AppBundle\Entity\Image $previewImage = null)
    {
        $this->previewImage = $previewImage;

        return $this;
    }

    /**
     * Get previewImage
     *
     * @return \Boxenmieten\AppBundle\Entity\Image 
     */
    public function getPreviewImage()
    {
        return $this->previewImage;
    }

    /**
     * Set summary
     *
     * @param string $summary
     * @return Set
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string 
     */
    public function getSummary()
    {
        return $this->summary;
    }
}