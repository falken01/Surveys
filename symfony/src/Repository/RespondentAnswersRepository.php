<?php

namespace App\Repository;

use App\Entity\RespondentAnswers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RespondentAnswers|null find($id, $lockMode = null, $lockVersion = null)
 * @method RespondentAnswers|null findOneBy(array $criteria, array $orderBy = null)
 * @method RespondentAnswers[]    findAll()
 * @method RespondentAnswers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RespondentAnswersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RespondentAnswers::class);
    }

    // /**
    //  * @return RespondentAnswers[] Returns an array of RespondentAnswers objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RespondentAnswers
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
