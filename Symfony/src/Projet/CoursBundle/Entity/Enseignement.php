<?php

namespace Projet\CoursBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet\CoursBundle\Entity\Enseignement
 */
class Enseignement
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $nom
     */
    private $nom;

    /**
     * @var string $visibilite
     */
    private $visibilite;

    /**
     * @var text $description
     */
    private $description;

    /**
     * @var boolean $actif
     */
    private $actif;


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
     * Set nom
     *
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set visibilite
     *
     * @param string $visibilite
     */
    public function setVisibilite($visibilite)
    {
        $this->visibilite = $visibilite;
    }

    /**
     * Get visibilite
     *
     * @return string 
     */
    public function getVisibilite()
    {
        return $this->visibilite;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set actif
     *
     * @param boolean $actif
     */
    public function setActif($actif)
    {
        $this->actif = $actif;
    }

    /**
     * Get actif
     *
     * @return boolean 
     */
    public function getActif()
    {
        return $this->actif;
    }
}