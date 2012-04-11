<?php

namespace Projet\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet\UserBundle\Entity\Promotion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Projet\UserBundle\Entity\PromotionRepository")
 */
class Promotion
{
	
	// Relation entre promootion et formation
	// Promotion est la proprietaire de la relation
	/**
	 * @ORM\ManyToOne(targetEntity="Projet\CoursBundle\Entity\Formation", inversedBy="promotions")
	 */
	private $formation;
	
	public function getFormation()
	{
		return $this->formation;
	}
	
	public function setFormation(\Projet\CoursBundle\Entity\Formation $formation)
	{
		$this->formation = $formation;
	}
	
	
	
	
	/**
	 * @ORM\OneToMany(targetEntity="Projet\CoursBundle\Entity\Enseignement", mappedBy="promotion")
	 */
	private $enseignements;
	
	public function getEnseignements()
	{
		return $this->enseignements;
	}
	
	public function addEnseignement(\Projet\CoursBundle\Entity\Enseignement $enseignement)
	{
		$this->enseignements[] = $enseignement;
		$enseignement->setPromotion($this);
	}
	
	
	
	
	
	
	/**
	 * @ORM\OneToMany(targetEntity="Projet\UserBundle\Entity\Etudiant", mappedBy="promotion")
	 */
	private $etudiants;
	
	public function getEtudiants()
	{
		return $this->etudiants;
	}
	
	public function addEtudiant(\Projet\UserBundle\Entity\Etudiant $etudiant)
	{
		$this->etudiants[] = $etudiant;
		$etudiant->setPromotion($this);
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
     * @var datetime $created_at
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $created_at;

    /**
     * @var date $annee
     *
     * @ORM\Column(name="annee", type="date")
     */
    private $annee;


    
    
    // constructeur
    public function __construct()
    {
    	$this->created_at = new \DateTime('now');
    	$this->annee = new \DateTime('now');
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

    /**
     * Set annee
     *
     * @param date $annee
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;
    }

    /**
     * Get annee
     *
     * @return date 
     */
    public function getAnnee()
    {
        return $this->annee;
    }
}