<?php

namespace Projet\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet\UserBundle\Entity\Etudiant
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Projet\UserBundle\Entity\EtudiantRepository")
 */
class Etudiant extends User
{	
	
	/**
	 * @ORM\ManyToOne(targetEntity="Projet\UserBundle\Entity\Promotion", inversedBy="etudiants")
	 */
	private $promotion;
	
	public function getPromotion()
	{
		return $this->promotion;
	}
	
	public function setPromotion(\Projet\UserBundle\Entity\Promotion $promotion)
	{
		$this->promotion = $promotion;
	}
	
	public function getEnseignements()
	{
		$this->promotion->getEnseignements();
	}
	
	
	
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var string $pseudo
     *
     * @ORM\Column(name="pseudo", type="string", length=60)
     */
    private $pseudo;
    


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
     * Set pseudo
     *
     * @param string $pseudo
     */
    public function setPseudo($pseudo)
    {
    	$this->pseudo = $this->crypter($this->id,$pseudo);
    }
    
    /**
     * Get pseudo
     *
     * @return string
     */
    public function getPseudo()
    {
    	return $this->decrypter($this->id, $this->pseudo);
    }
    
    
    
    // cryptage
    private function crypter($maCleDeCryptage="", $maChaineACrypter){
    	if($maCleDeCryptage==""){
    		$maCleDeCryptage= $this->id;
    	}
    	$maCleDeCryptage = md5($maCleDeCryptage);
    	$letter = -1;
    	$newstr = '';
    	$strlen = strlen($maChaineACrypter);
    	for($i = 0; $i < $strlen; $i++ ){
    		$letter++;
    		if ( $letter > 31 ){
    			$letter = 0;
    		}
    		$neword = ord($maChaineACrypter{$i}) + ord($maCleDeCryptage{$letter});
    		if ( $neword > 255 ){
    			$neword -= 256;
    		}
    		$newstr .= chr($neword);
    	}
    	return base64_encode($newstr);
    }
    
    
    
    
    
    // decryptage
    private function decrypter($maCleDeCryptage="", $maChaineCrypter){
    	if($maCleDeCryptage==""){
    		$maCleDeCryptage=$this->id;
    	}
    	$maCleDeCryptage = md5($maCleDeCryptage);
    	$letter = -1;
    	$newstr = '';
    	$maChaineCrypter = base64_decode($maChaineCrypter);
    	$strlen = strlen($maChaineCrypter);
    	for ( $i = 0; $i < $strlen; $i++ ){
    		$letter++;
    		if ( $letter > 31 ){
    			$letter = 0;
    		}
    		$neword = ord($maChaineCrypter{$i}) - ord($maCleDeCryptage{$letter});
    		if ( $neword < 1 ){
    			$neword += 256;
    		}
    		$newstr .= chr($neword);
    	}
    	return $newstr;
    }
    
    
}