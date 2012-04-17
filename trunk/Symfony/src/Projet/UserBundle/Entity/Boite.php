<?php

namespace Projet\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet\UserBundle\Entity\Boite
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Projet\UserBundle\Entity\BoiteRepository")
 */
class Boite
{
	
	/**
	 * @ORM\ManyToOne(targetEntity="Projet\UserBundle\Entity\Message", inversedBy="boites")
	 */
	private $message;
	
	public function getMessage()
	{
		return $this->message;
	}
	
	public function setMessage(\Projet\UserBundle\Entity\Message $message)
	{
		$this->message = $message;
	}
	
	
	
	
	
	/**
	 * @ORM\ManyToOne(targetEntity="Projet\UserBundle\Entity\User", inversedBy="boites")
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
     * @var string $type_envoi
     *
     * @ORM\Column(name="type_envoi", type="string", length=40)
     */
    private $type_envoi;
    
    /**
     * @var boolean $vu
     *
     * @ORM\Column(name="vu", type="boolean")
     */
    private $vu;

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
    	return $this->type_envoi;
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
     * Set type_envoi
     *
     * @param string $typeEnvoi
     */
    public function setTypeEnvoi($typeEnvoi)
    {
        $this->type_envoi = $typeEnvoi;
    }

    /**
     * Get type_envoi
     *
     * @return string 
     */
    public function getTypeEnvoi()
    {
        return $this->type_envoi;
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