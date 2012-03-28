<?php

namespace Projet\CoursBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet\CoursBundle\Entity\Devoir
 */
class Devoir
{
	
	
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
	
	
	
	
	
    /**
     * @var integer $id
     */
    private $id;
    
    /**
     * @var string $nom
     */
    private $nom;

    /**
     * @var text $description
     */
    private $description;

    /**
     * @var datetime $created_at
     */
    private $created_at;

    /**
     * @var datetime $expire_at
     */
    private $expire_at;

    
    // constructeur
    public function __construct()
    {
    	$this->created_at = new \DateTime('now');
    }
    
    // toString méthode
    public function __toString() {
    	return $this->description;
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