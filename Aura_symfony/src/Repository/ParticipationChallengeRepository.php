<?php

namespace App\Repository;



use Doctrine\ORM\EntityRepository;

use Doctrine\Persistence\ManagerRegistry;

use App\Entity\participation_challenge;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;


/**
 * @method participation_challenge|null find($id, $lockMode = null, $lockVersion = null)
 * @method participation_challenge|null findOneBy(array $criteria, array $orderBy = null)
 * @method participation_challenge[]    findAll()
 * @method participation_challenge[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParticipationChallengeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, challenge ::class);
    }

    // /**
    //  * @return participation_challenge[] Returns an array of participation_challenge objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?participation_challenge
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}