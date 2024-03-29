<?php

namespace Projet\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ConversationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ConversationRepository extends EntityRepository
{
	public function findIncomingConversations($id_message, $id_user)
	{
	
		// On passe par le QueryBuilder vide de l'EntityManager pour l'exemple
		$qb = $this->_em->createQueryBuilder();
	
		$qb->select('c')
		->from('ProjetUserBundle:Conversation', 'c')
		->where('c.user != :id')
		->setParameter('id', $id_user)
		->andWhere('c.vu = 0')
		->andWhere('c.message = ?2')
		->setParameter(2, $id_message)
		;
	
	
		return $qb->getQuery()
		->getResult();
	}
}