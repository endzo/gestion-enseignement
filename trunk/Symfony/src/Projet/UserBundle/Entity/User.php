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
    /*
    public function getExpiresAt()
    {
    	return $this->expiresAt;
    }*/
}