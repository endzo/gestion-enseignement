<?php

namespace Projet\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet\UserBundle\Entity\Enseignant
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Projet\UserBundle\Entity\EnseignantRepository")
 */
class Enseignant extends User
{
	
	/**
	 * @ORM\OneToMany(targetEntity="Projet\CoursBundle\Entity\Enseignement", mappedBy="enseignant")
	 */
	private $enseignements;
	
	public function getEnseignements()
	{
		return $this->enseignements;
	}
	
	public function addEnseignement(\Projet\CoursBundle\Entity\Enseignement $enseignement)
	{
		$this->enseignements[] = $enseignement;
		$enseignement->setEnseignant($this);
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