<?php

namespace Projet\CoursBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Projet\CoursBundle\Entity\Document
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Projet\CoursBundle\Entity\DocumentRepository")
 */
class Document
{
	
	//relation entre enseignement et document
	// document est la proprietaire de la relation
	/**
	 * @ORM\ManyToOne(targetEntity="Projet\CoursBundle\Entity\Enseignement", inversedBy="documents")
	 */
	private $enseignement;
	
	public function getEnseignement()
	{
		return $this->enseignement;
	}
	
	public function setEnseignement(\Projet\CoursBundle\Entity\Enseignement $enseignement)
	{
		$this->enseignement = $enseignement;
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
     * @var string $nom
     *
     * @ORM\Column(name="nom", type="string", length=60)
     */
    private $nom;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string $chemin
     *
     * @ORM\Column(name="chemin", type="string", length=100)
     */
    private $chemin;
    
    /**
     * @var string $attachement
     * @Assert\File(maxSize="6000000")
     */
    public $attachement;

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
    	return $this->nom;
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
     * Set chemin
     *
     * @param string $chemin
     */
    public function setChemin($chemin)
    {
        $this->chemin = $chemin;
    }

    /**
     * Get chemin
     *
     * @return string 
     */
    public function getChemin()
    {
        return $this->chemin;
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
     * 
     * @param unknown_type $attachement
     */
    public function setAttachement($attachement)
    {
    	$this->attachement = $attachement;
    }
    
    
    public function getAttachement()
    {
    	return $this->attachement;
    }
    
    
    // partie chemin
    
    public function getAbsolutePath()
    {
    	return null === $this->chemin ? null : $this->getUploadRootDir().'/'.$this->chemin;
    }
    
    public function getWebPath()
    {
    	return null === $this->chemin ? null : $this->getUploadDir().'/'.$this->chemin;
    }
    
    protected function getUploadRootDir()
    {
    	// the absolute directory path where uploaded documents should be saved
    	return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
    
    protected function getUploadDir()
    {
    	// get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
    	return 'uploads/documents';
    }
}