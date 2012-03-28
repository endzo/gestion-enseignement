<?php

namespace Amine\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Amine\ForumBundle\Entity\User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Amine\ForumBundle\Entity\UserRepository")
 */
class User
{
	/**
     * @ORM\OneToMany(targetEntity="Amine\ForumBundle\Entity\Comment", mappedBy="user")
     */
	 private $comments;

    public function getComments()
    {
        return $this->comments;
    }

    public function addComment(\Amine\ForumBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;
		$comment->setUser($this);
    }
	
	
	/**
     * @ORM\OneToMany(targetEntity="Amine\ForumBundle\Entity\Subject", mappedBy="user")
     */
	 private $subjects;

    public function getSubjects()
    {
        return $this->subjects;
    }

    public function addSubject(\Amine\ForumBundle\Entity\Subject $subject)
    {
        $this->subjects[] = $subject;
		$subject->setUser($this);
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
     * @var string $login
     *
     * @ORM\Column(name="login", type="string", length=40)
     */
    private $login;

    /**
     * @var string $password
     *
     * @ORM\Column(name="password", type="string", length=40)
     */
    private $password;

    /**
     * @var string $nom
     *
     * @ORM\Column(name="nom", type="string", length=40)
     */
    private $nom;

    /**
     * @var string $prenom
     *
     * @ORM\Column(name="prenom", type="string", length=40)
     */
    private $prenom;

    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=60)
     */
    private $email;

    /**
     * @var datetime $created_at
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $created_at;

	//constructeur
	public function __construct()
	{
		$this->created_at = new \DateTime('now');
	}
	
	// toString méthode
	public function __toString() {
        return $this->login;
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
     * Set login
     *
     * @param string $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
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

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
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