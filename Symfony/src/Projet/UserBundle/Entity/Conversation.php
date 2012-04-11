<?php

namespace Projet\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet\UserBundle\Entity\Conversation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Projet\UserBundle\Entity\ConversationRepository")
 */
class Conversation
{
	
	/**
	 * @ORM\ManyToOne(targetEntity="Projet\UserBundle\Entity\User", inversedBy="conversations")
	 */
	private $user;
	
	// On définit le getter et le setter associé.
	public function getUser()
	{
		return $this->user;
	}
	
	// Ici, on force le type de l'argument à être une instance de notre entité Document.
	public function setUser(\Projet\UserBundle\Entity\User $user)
	{
		$this->user = $user;
	}
	
	
	
	
	
	/**
	 * @ORM\ManyToOne(targetEntity="Projet\UserBundle\Entity\Message", inversedBy="conversations")
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
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var text $message
     *
     * @ORM\Column(name="message", type="text")
     */
    private $msg;

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
    	return $this->msg;
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
     * Set message
     *
     * @param text $message
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;
    }

    /**
     * Get message
     *
     * @return text 
     */
    public function getMsg()
    {
        return $this->msg;
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