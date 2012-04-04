<?php

namespace Projet\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet\TestBundle\Entity\Employee
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Employee extends Person
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var float $salaire
     *
     * @ORM\Column(name="salaire", type="float")
     */
    private $salaire;


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
     * Set salaire
     *
     * @param float $salaire
     */
    public function setSalaire($salaire)
    {
        $this->salaire = $salaire;
    }

    /**
     * Get salaire
     *
     * @return float 
     */
    public function getSalaire()
    {
        return $this->salaire;
    }
}