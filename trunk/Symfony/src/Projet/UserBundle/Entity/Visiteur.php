<?php

namespace Projet\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet\UserBundle\Entity\Visiteur
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Projet\UserBundle\Entity\VisiteurRepository")
 */
class Visiteur extends User
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}