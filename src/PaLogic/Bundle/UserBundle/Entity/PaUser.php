<?php
// src/Acme/UserBundle/Entity/User.php

namespace PaLogic\Bundle\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="pauser")
 */
class PaUser extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="PaLogic\Bundle\DjBundle\Entity\Dj", mappedBy="owner")
     */
    private $djs;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="PaLogic\Bundle\ImageBundle\Entity\Image", mappedBy="owner")
     */
    private $images;

    public function __construct()
    {
        parent::__construct();
        // your own logic
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
     * Add djs
     *
     * @param \PaLogic\Bundle\DjBundle\Entity\Dj $djs
     * @return PaUser
     */
    public function addDj(\PaLogic\Bundle\DjBundle\Entity\Dj $djs)
    {
        $this->djs[] = $djs;

        return $this;
    }

    /**
     * Remove djs
     *
     * @param \PaLogic\Bundle\DjBundle\Entity\Dj $djs
     */
    public function removeDj(\PaLogic\Bundle\DjBundle\Entity\Dj $djs)
    {
        $this->djs->removeElement($djs);
    }

    /**
     * Get djs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDjs()
    {
        return $this->djs;
    }

    /**
     * Add images
     *
     * @param \PaLogic\Bundle\ImageBundle\Entity\Image $images
     * @return PaUser
     */
    public function addImage(\PaLogic\Bundle\ImageBundle\Entity\Image $images)
    {
        $this->images[] = $images;

        return $this;
    }

    /**
     * Remove images
     *
     * @param \PaLogic\Bundle\ImageBundle\Entity\Image $images
     */
    public function removeImage(\PaLogic\Bundle\ImageBundle\Entity\Image $images)
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
}
