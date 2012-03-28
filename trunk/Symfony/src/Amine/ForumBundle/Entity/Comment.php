<?php

namespace Amine\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Amine\ForumBundle\Entity\Comment
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Amine\ForumBundle\Entity\CommentRepository")
 */
class Comment
{
	/**
     * @ORM\ManyToOne(targetEntity="Amine\ForumBundle\Entity\Subject", inversedBy="comments")
     */
	 private $subject;
	 
	 public function getSubject()
	 {
		return $this->subject;
	 }
	 
	 public function setSubject(\Amine\ForumBundle\Entity\Subject $subject)
     {
        $this->subject = $subject;
     }
	 
	 


	/**
     * @ORM\ManyToOne(targetEntity="Amine\ForumBundle\Entity\User", inversedBy="comments")
     */
	 private $user;
	 
	 public function getUser()
	 {
		return $this->user;
	 }
	 
	 public function setClient(\Amine\ForumBundle\Entity\User $user)
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
     * @var text $comm
     *
     * @ORM\Column(name="comm", type="text")
     */
    private $comm;

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
        return $this->comm;
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
     * Set comm
     *
     * @param text $comm
     */
    public function setComm($comm)
    {
        $this->comm = $comm;
    }

    /**
     * Get comm
     *
     * @return text 
     */
    public function getComm()
    {
        return $this->comm;
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
     * Set user
     *
     * @param Amine\ForumBundle\Entity\User $user
     */
    public function setUser(\Amine\ForumBundle\Entity\User $user)
    {
        $this->user = $user;
    }
}