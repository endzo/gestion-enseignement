<?php

namespace Projet\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet\UserBundle\Entity\Etudiant
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Projet\UserBundle\Entity\EtudiantRepository")
 */
class Etudiant extends User
{
	
	/**
	 * @ORM\ManyToOne(targetEntity="Projet\UserBundle\Entity\Promotion", inversedBy="etudiants")
	 */
	private $promotion;
	
	public function getPromotion()
	{
		return $this->promotion;
	}
	
	public function setPromotion(\Projet\UserBundle\Entity\Promotion $promotion)
	{
		$this->promotion = $promotion;
	}
	
	
	
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