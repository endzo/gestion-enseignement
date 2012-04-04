<?php

namespace Projet\CoursBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet\CoursBundle\Entity\Critere
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Projet\CoursBundle\Entity\CritereRepository")
 */
class Critere
{
	
	
	// relation entre enseignement  et critere 
	// critere est la proprietaire de la relation
	/**
	 * @ORM\ManyToOne(targetEntity="Projet\CoursBundle\Entity\Enseignement", inversedBy="criteres")
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
     * @var string $nom
     *
     * @ORM\Column(name="nom", type="string", length=60)
     */
    private $nom;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var integer $note
     *
     * @ORM\Column(name="note", type="integer")
     */
    private $note;

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
    	return $this->nom;
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