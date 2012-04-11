<?php

namespace Projet\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet\UserBundle\Entity\Note
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Projet\UserBundle\Entity\NoteRepository")
 */
class Note
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var text $appreciation
     *
     * @ORM\Column(name="appreciation", type="text")
     */
    private $appreciation;

    /**
     * @var datetime $created_at
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $created_at;

    /**
     * @var float $note
     *
     * @ORM\Column(name="note", type="float")
     */
    private $note;


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
     * Set appreciation
     *
     * @param text $appreciation
     */
    public function setAppreciation($appreciation)
    {
        $this->appreciation = $appreciation;
    }

    /**
     * Get appreciation
     *
     * @return text 
     */
    public function getAppreciation()
    {
        return $this->appreciation;
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
     * Set note
     *
     * @param float $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * Get note
     *
     * @return float 
     */
    public function getNote()
    {
        return $this->note;
    }
}