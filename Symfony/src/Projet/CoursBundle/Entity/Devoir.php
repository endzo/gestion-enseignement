<?php

namespace Projet\CoursBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet\CoursBundle\Entity\Devoir
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Projet\CoursBundle\Entity\DevoirRepository")
 */
class Devoir
{
	
	/**
	 * @ORM\OneToOne(targetEntity="Projet\CoursBundle\Entity\Document")
	 */
	private $document;
	
	// On définit le getter et le setter associé.
	public function getDocument()
	{
		return $this->adresse;
	}
	
	// Ici, on force le type de l'argument à être une instance de notre entité Document.
	public function setDocument(\Projet\CoursBundle\Entity\Document $document)
	{
		$this->document = $document;
	}
	
	
	
	
	
	// relation Devoir et type
	// devoir est la proprietaire de la relation
	/**
	 * @ORM\ManyToOne(targetEntity="Projet\CoursBundle\Entity\Type", inversedBy="devoirs")
	 */
	private $type;
	
	public function getType()
	{
		return $this->type;
	}
	
	public function setType(\Projet\CoursBundle\Entity\Type $type)
	{
		$this->type = $type;
	}
	
	
	public static function getTps($devoirs) {
		$tps = array();
		foreach ($devoirs as $devoir) {
			if ($devoir->getType()->getNom() == "TP") {
				$tps[] = $devoir;
			}
		}
		return $tps;
		
	}
	
	public static function getTds($devoirs) {
		$tds = array();
		foreach ($devoirs as $devoir) {
			if ($devoir->getType()->getNom() == "TD") {
				$tds[] = $devoir;
			}
		}
		return $tds;
	
	}
	
	public static function getExercices($devoirs) {
		$exercices = array();
		foreach ($devoirs as $devoir) {
			if ($devoir->getType()->getNom() == "Exercice") {
				$exercices[] = $devoir;
			}
		}
		return $exercices;
	
	}
	
	public static function getProjets($devoirs) {
		$projets = array();
		foreach ($devoirs as $devoir) 
		{
			if ($devoir->getType()->getNom() == "Projet") 
			{
				$projets[] = $devoir;
			}
		}
		return $projets;
	
	}
	
	public static function getAutres($devoirs) {
		$autres = array();
		foreach ($devoirs as $devoir) 
		{
			if ($devoir->getType()->getNom() != "TP" & $devoir->getType()->getNom() == "TD" & $devoir->getType()->getNom() == "Exercice" & $devoir->getType()->getNom() == "Projet") 
			{
				$autres[] = $devoir;
			}
		}
		return $autres;
	
	}
	
	
	
	
	
	// Relation entre enseignement et devoirs
	// devoir est la relation proprietaire
	/**
	 * @ORM\ManyToOne(targetEntity="Projet\CoursBundle\Entity\Enseignement", inversedBy="devoirs")
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
     * @var datetime $created_at
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $created_at;

    /**
     * @var datetime $expire_at
     *
     * @ORM\Column(name="expire_at", type="datetime")
     */
    private $expire_at;


    
    
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
     * Set expire_at
     *
     * @param datetime $expireAt
     */
    public function setExpireAt($expireAt)
    {
        $this->expire_at = $expireAt;
    }

    /**
     * Get expire_at
     *
     * @return datetime 
     */
    public function getExpireAt()
    {
        return $this->expire_at;
    }
}