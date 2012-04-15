<?php

namespace Projet\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet\UserBundle\Entity\Alerte
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Projet\UserBundle\Entity\AlerteRepository")
 */
class Alerte
{
	
	/**
	 * @ORM\OneToMany(targetEntity="Projet\UserBundle\Entity\Alerte", mappedBy="user")
	 */
	private $alertes;
	
	public function getAlertes()
	{
		return $this->alertes;
	}
	
	public function addAlerte(\Projet\UserBundle\Entity\Alerte $alerte)
	{
		$this->alertes[] = $alerte;
		$alerte->setUser($this);
	}
	
	
	
	
	
	
	/**
	 * @ORM\ManyToOne(targetEntity="Projet\UserBundle\Entity\User", inversedBy="alertes")
	 */
	private $user;
	
	public function getUser()
	{
		return $this->user;
	}
	
	public function setUser(\Projet\UserBundle\Entity\User $user)
	{
		$this->user = $user;
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
     * @var text $nom
     *
     * @ORM\Column(name="nom", type="text")
     */
    private $nom;

    /**
     * @var datetime $created_at
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $created_at;

    /**
     * @var boolean $vu
     *
     * @ORM\Column(name="vu", type="boolean")
     */
    private $vu;

    
    
    
    // constructeur
    public function __construct()
    {
    	$this->created_at = new \DateTime('now');
    }
    
    // toString méthode
    public function __toString() {
    	return $this->message;
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
     * @param text $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * Get nom
     *
     * @return text 
     */
    public function getNom()
    {
        return $this->nom;
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
     * Set vu
     *
     * @param boolean $vu
     */
    public function setVu($vu)
    {
        $this->vu = $vu;
    }

    /**
     * Get vu
     *
     * @return boolean 
     */
    public function getVu()
    {
        return $this->vu;
    }
}