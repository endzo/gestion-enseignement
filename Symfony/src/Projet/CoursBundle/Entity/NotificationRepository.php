<?php

namespace Projet\CoursBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * notificationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NotificationRepository extends EntityRepository
{
	
	public function findEtudiantNotifications($id,$user_id)
	{
	
		// On passe par le QueryBuilder vide de l'EntityManager pour l'exemple
		$qb = $this->_em->createQueryBuilder();
	
		$qb->select('n')
		->from('ProjetCoursBundle:Notification', 'n')
		->where('n.id > ?1')
		->setParameter('1', $id)
		->join('n.enseignement', 'e')
        ->join('e.promotion', 'p')
        ->join('p.etudiants','u')
        ->andWhere("u.id = ?2")
        ->setParameter('2', $user_id)
		->addOrderBy('n.id','DESC')
		->setMaxResults(1)
		;
	
	
		return $qb->getQuery()
		->getResult();
	}
	
	
	
	public function findEtudiantFilActualite($user_id)
	{
	
		// On passe par le QueryBuilder vide de l'EntityManager pour l'exemple
		$qb = $this->_em->createQueryBuilder();
	
		$qb->select('n')
		->from('ProjetCoursBundle:Notification', 'n')
		->join('n.enseignement', 'e')
		->join('e.promotion', 'p')
		->join('p.etudiants','u')
		->andWhere("u.id = ?1")
		->setParameter('1', $user_id)
		->addOrderBy('n.id','DESC')
		->setMaxResults(6)
		;
	
	
		return $qb->getQuery()
		->getResult();
	}
	
	
	
	// Partie professeur
	
	public function findEnseignantNotifications($id,$user_id)
	{
	
		// On passe par le QueryBuilder vide de l'EntityManager pour l'exemple
		$qb = $this->_em->createQueryBuilder();
	
		$qb->select('n')
		->from('ProjetCoursBundle:Notification', 'n')
		->where('n.id > ?1')
		->setParameter('1', $id)
		->join('n.enseignement', 'e')
		->join('e.enseignant', 'ens')
		->andWhere("ens.id = ?2")
		->setParameter('2', $user_id)
		->addOrderBy('n.id','DESC')
		->setMaxResults(1)
		;
	
	
		return $qb->getQuery()
		->getResult();
	}
	
	
	
	public function findEnseignantFilActualite($user_id)
	{
	
		// On passe par le QueryBuilder vide de l'EntityManager pour l'exemple
		$qb = $this->_em->createQueryBuilder();
	
		$qb->select('n')
		->from('ProjetCoursBundle:Notification', 'n')
		->join('n.enseignement', 'e')
		->join('e.enseignant', 'ens')
		->andWhere("ens.id = ?1")
		->setParameter('1', $user_id)
		->addOrderBy('n.id','DESC')
		->setMaxResults(6)
		;
	
	
		return $qb->getQuery()
		->getResult();
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}