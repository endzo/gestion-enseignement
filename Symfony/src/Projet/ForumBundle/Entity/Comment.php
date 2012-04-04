<?php

namespace Projet\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet\ForumBundle\Entity\Comment
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Projet\ForumBundle\Entity\CommentRepository")
 */
class Comment
{
	
	/**
	 * @ORM\ManyToOne(targetEntity="Projet\ForumBundle\Entity\Sujet", inversedBy="commentaires")
	 */
	private $sujet;
	
	public function getSujet()
	{
		return $this->sujet;
	}
	
	public function setSujet(\Projet\ForumBundle\Entity\Sujet $sujet)
	{
		$this->sujet = $sujet;
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
     * @var text $commentaire
     *
     * @ORM\Column(name="commentaire", type="text")
     */
    private $commentaire;

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
    	return $this->commentaire;
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
     * Set commentaire
     *
     * @param text $commentaire
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }

    /**
     * Get commentaire
     *
     * @return text 
     */
    public function getCommentaire()
    {
        return $this->commentaire;
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