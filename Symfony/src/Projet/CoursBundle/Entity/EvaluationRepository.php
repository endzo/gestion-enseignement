<?php

namespace Projet\CoursBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * EvaluationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EvaluationRepository extends EntityRepository
{
	
	public function findAllForEnseignement($id_cours)
	{
		// On passe par le QueryBuilder vide de l'EntityManager pour l'exemple
		$qb = $this->_em->createQueryBuilder();
		
		$qb->select('e')
		->from('ProjetCoursBundle:Evaluation', 'e')
		->where('e.enseignement = ?1')
		->setParameter('1', $id_cours)
		->addSelect('etu')
		->join('e.etudiant', 'etu')
		;
		
		
		return $qb->getQuery()
		->getResult();
	}
	
	
}