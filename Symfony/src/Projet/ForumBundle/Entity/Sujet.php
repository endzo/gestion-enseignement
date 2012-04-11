<?php

namespace Projet\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet\ForumBundle\Entity\Sujet
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Projet\ForumBundle\Entity\SujetRepository")
 */
class Sujet
{
	
	/**
	 * @ORM\ManyToOne(targetEntity="Projet\CoursBundle\Entity\Enseignement", inversedBy="sujets")
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
	 * @ORM\OneToMany(targetEntity="Projet\ForumBundle\Entity\Comment", mappedBy="sujet")
	 */
	private $commentaires;
	
	public function getCommentaires()
	{
		return $this->commentaires;
	}
	
	public function addCommentaire(\Projet\ForumBundle\Entity\Comment $commentaire)
	{
		$this->commentaires[] = $commentaire;
		$commentaire->setSujet($this);
	}
	
	
	
	
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
     * @var datetime $created_at
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $created_at;

    /**
     * @var string $visibilite
     *
     * @ORM\Column(name="visibilite", type="string", length=20)
     */
    private $visibilite;


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
}