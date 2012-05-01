<?php

namespace Projet\CoursBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Projet\CoursBundle\Entity\Evaluation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Projet\CoursBundle\Entity\EvaluationRepository")
 */
class Evaluation
{
	/**
	 * @ORM\ManyToOne(targetEntity="Projet\UserBundle\Entity\Etudiant", inversedBy="evaluations")
	 */
	private $etudiant;
	
	public function getEtudiant()
	{
		return $this->etudiant;
	}
	
	public function setEtudiant(\Projet\UserBundle\Entity\Etudiant $etudiant)
	{
		$this->etudiant = $etudiant;
	}
	
	
	
	/**
	 * @ORM\ManyToOne(targetEntity="Projet\CoursBundle\Entity\Enseignement", inversedBy="evaluation")
	 */
	private $enseignement;
	
	public function getEnseignement()
	{
		return $this->enseignement;
	}
	
	public function setEnseignement(\Projet\CoursBundle\Entity\Enseignement $enseignement)
	{
		$this->enseignement = $enseignement;
	}
	
	
	
	
	
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer $note
     * @Assert\Min(limit = "0", message = "La note doit être positive")
	 * @Assert\Max(limit = "20", message = "La note doit être comprise entre 0 et 20")
     * @ORM\Column(name="note", type="integer")
     */
    private $note;

    /**
     * @var text $remarque
     *
     * @ORM\Column(name="remarque", type="text")
     */
    private $remarque;

    /**
     * @var datetime $created_at
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $created_at;


    // constructeur
    public function __construct()
    {
    	$this->created_at = new \DateTime('now');
    }
    
    // toString méthode
    public function __toString() {
    	$string = $this->enseignement.' : '.$this->note;
    	return $string;
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
     * Set note
     *
     * @param integer $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * Get note
     *
     * @return integer 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set remarque
     *
     * @param text $remarque
     */
    public function setRemarque($remarque)
    {
        $this->remarque = $remarque;
    }

    /**
     * Get remarque
     *
     * @return text 
     */
    public function getRemarque()
    {
        return $this->remarque;
    }

    /**
     * Set created_at
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    }

    /**
     * Get created_at
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }
}