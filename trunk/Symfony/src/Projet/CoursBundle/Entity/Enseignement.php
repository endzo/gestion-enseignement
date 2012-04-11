<?php

namespace Projet\CoursBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet\CoursBundle\Entity\Enseignement
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Projet\CoursBundle\Entity\EnseignementRepository")
 */
class Enseignement
{
	
	/**
	 * @ORM\ManyToOne(targetEntity="Projet\UserBundle\Entity\Enseignant", inversedBy="enseignements")
	 */
	private $enseignant;
	
	public function getEnseignant()
	{
		return $this->enseignant;
	}
	
	public function setEnseignant(\Projet\UserBundle\Entity\Enseignant $enseignant)
	{
		$this->enseignant = $enseignant;
	}
	
	
	
	
	
	/**
	 * @ORM\ManyToOne(targetEntity="Projet\UserBundle\Entity\Promotion", inversedBy="enseignements")
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
	
	
	
	//relation  entre enseignement et sujet
	// sujet est la proprietaire de la relation
	/**
	 * @ORM\OneToMany(targetEntity="Projet\ForumBundle\Entity\Sujet", mappedBy="enseignement")
	 */
	private $sujets;
	
	public function getSujets()
	{
		return $this->sujets;
	}
	
	public function addSujet(\Projet\ForumBundle\Entity\Sujet $sujet)
	{
		$this->sujets[] = $sujet;
		$sujet->setEnseignement($this);
	}
	
	
	
	// relation entre enseignement et critere  
	// critere est la propietaire de la relation 
	/**
	 * @ORM\OneToMany(targetEntity="Projet\CoursBundle\Entity\Critere", mappedBy="enseignement")
	 */
	private $criteres;
	
	public function getCriteres()
	{
		return $this->criteres;
	}
	
	public function addCritere(\Projet\CoursBundle\Entity\Critere $critere)
	{
		$this->criteres[] = $critere;
		$critere->setEnseignement($this);
	}
	
	
	
	
	// relation entre enseignement et document 
	// document est le proprietaire de la relation
	/**
	 * @ORM\OneToMany(targetEntity="Projet\CoursBundle\Entity\Document", mappedBy="enseignement")
	 */
	private $documents;
	
	public function getDocuments()
	{
		return $this->documents;
	}
	
	public function addDocument(\Projet\CoursBundle\Entity\Document $document)
	{
		$this->documents[] = $document;
		$document->setEnseignement($this);
	}
	
	
	
	//relation entre enseignement et devoir
	// devoir est la proprietaire de la relation
	/**
	 * @ORM\OneToMany(targetEntity="Projet\CoursBundle\Entity\Devoir", mappedBy="enseignement")
	 */
	private $devoirs;
	
	public function getDevoirs()
	{
		return $this->devoirs;
	}
	
	public function addDevoir(\Projet\CoursBundle\Entity\Devoir $devoir)
	{
		$this->devoirs[] = $devoir;
		$devoir->setEnseignement($this);
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
     * @ORM\Column(name="nom", type="string", length=80)
     */
    private $nom;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string $visibilite
     *
     * @ORM\Column(name="visibilite", type="string", length=20)
     */
    private $visibilite;

    /**
     * @var boolean $actif
     *
     * @ORM\Column(name="actif", type="boolean")
     */
    private $actif;

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