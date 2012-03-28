<?php

namespace Amine\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Amine\ForumBundle\Entity\Subject
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Amine\ForumBundle\Entity\SubjectRepository")
 */
class Subject
{
	/**
     * @ORM\OneToMany(targetEntity="Amine\ForumBundle\Entity\Comment", mappedBy="subject")
     */
	 private $comments;

    public function getComments()
    {
        return $this->comments;
    }
	
	public function addComment(\Amine\ForumBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;
		$comment->setSubject($this);
    }
	
	
	
	/**
     * @ORM\ManyToOne(targetEntity="Amine\ForumBundle\Entity\User", inversedBy="subjects")
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
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=80)
     */
    private $title;

    /**
     * @var datetime $created_at
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $created_at;

    /**
     * @var string $visibility
     *
     * @ORM\Column(name="visibility", type="string", length=20)
     */
    private $visibility;

	// constructeur
	public function __construct()
	{
		$this->created_at = new \DateTime('now');
	}
	
	// toString méthode
	public function __toString() {
        return $this->title;
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
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
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
     * Set visibility
     *
     * @param string $visibility
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
    }

    /**
     * Get visibility
     *
     * @return string 
     */
    public function getVisibility()
    {
        return $this->visibility;
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