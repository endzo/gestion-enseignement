<?php
// src/Projet/UserBundle/Entity/User.php

namespace Projet\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="user")
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"user" = "User", "etudiant" = "Etudiant", "enseignant" = "Enseignant", "visiteur" = "Visiteur"})
 */
class User extends BaseUser
{
	/**
	 * @ORM\OneToMany(targetEntity="Projet\ForumBundle\Entity\Comment", mappedBy="user")
	 */
	private $commentaires;
	
	public function getCommentaires()
	{
		return $this->commentaires;
	}
	
	public function addCommentaire(\Projet\ForumBundle\Entity\Comment $commentaire)
	{
		$this->commentaires[] = $commentaire;
		$commentaire->setUser($this);
	}
	
	
	
	/**
	 * @ORM\OneToMany(targetEntity="Projet\CoursBundle\Entity\Notification", mappedBy="user")
	 */
	private $notifications;
	
	public function getNotifications()
	{
		return $this->notifications;
	}
	
	public function addNotification(\Projet\CoursBundle\Entity\Notification $notification)
	{
		$this->notifications[] = $notification;
		$notification->setUser($this);
	}
	
	
		
	/**
	 * @ORM\OneToMany(targetEntity="Projet\UserBundle\Entity\Boite", mappedBy="user")
	 */
	private $boites;
	
	public function getBoites()
	{
		return $this->boites;
	}
	
	public function addBoite(\Projet\UserBundle\Entity\Boite $boite)
	{
		$this->boites[] = $boite;
		$boite->setUser($this);
	}
	
	
	
	/**
	 * @ORM\OneToMany(targetEntity="Projet\UserBundle\Entity\Conversation", mappedBy="user")
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
	 * @ORM\OneToMany(targetEntity="Projet\UserBundle\Entity\Message", mappedBy="user")
	 */
	private $messages;
	
	public function getMessages()
	{
		return $this->messages;
	}
	
	public function addMessage(\Projet\UserBundle\Entity\Message $message)
	{
		$this->messages[] = $message;
		$message->setUser($this);
	}
	
	
	
	
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @return datetime
     */
    
    
    
    /**
     * @var string $nom
     *
     * @ORM\Column(name="nom", type="string", length=60)
     */
    private $nom;
    
    
    /**
     * @var string $prenom
     *
     * @ORM\Column(name="prenom", type="string", length=60)
     */
    private $prenom;
    
    
    
    
    
    /**
     * Set sujet
     *
     * @param string $sujet
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
     * Set prenom
     *
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
    	$this->prenom = $prenom;
    }
    
    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
    	return $this->prenom;
    }
}