<?php

namespace Projet\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet\UserBundle\Entity\Message
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Projet\UserBundle\Entity\MessageRepository")
 */
class Message
{
	
	/**
	 * @ORM\OneToMany(targetEntity="Projet\UserBundle\Entity\Boite", mappedBy="message")
	 */
	private $boites;
	
	public function getBoites()
	{
		return $this->boites;
	}
	
	public function addBoite(\Projet\UserBundle\Entity\Boite $boite)
	{
		$this->boites[] = $boite;
		$boite->setMessage($this);
	}
	
	
	
	
	
	/**
	 * @ORM\OneToMany(targetEntity="Projet\UserBundle\Entity\Conversation", mappedBy="message")
	 */
	private $conversations;
	
	public function getConversations()
	{
		return $this->conversations;
	}
	
	public function addConversation(\Projet\UserBundle\Entity\Conversation $conversation)
	{
		$this->conversations[] = $conversation;
		$conversation->setMessage($this);
	}
	
	
	
	
	
	
	/**
	 * @ORM\ManyToOne(targetEntity="Projet\UserBundle\Entity\User", inversedBy="messages")
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
     * @var string $sujet
     *
     * @ORM\Column(name="sujet", type="string", length=60)
     */
    private $sujet;

    /**
     * @var text $message
     *
     * @ORM\Column(name="message", type="text")
     */
    private $message;
    
    /**
     * @var string $destinataire
     *
     * @ORM\Column(name="destinataire", type="string", length=60)
     */
    private $destinataire;
    
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
     * Set sujet
     *
     * @param string $sujet
     */
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;
    }

    /**
     * Get sujet
     *
     * @return string 
     */
    public function getSujet()
    {
        return $this->sujet;
    }
    
    /**
     * Set destinataire
     *
     * @param string $destinataire
     */
    public function setDestinataire($destinataire)
    {
    	$this->destinataire = $destinataire;
    }
    
    /**
     * Get destinataire
     *
     * @return string
     */
    public function getDestinataire()
    {
    	return $this->destinataire;
    }

    /**
     * Set message
     *
     * @param text $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * Get message
     *
     * @return text 
     */
    public function getMessage()
    {
        return $this->message;
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