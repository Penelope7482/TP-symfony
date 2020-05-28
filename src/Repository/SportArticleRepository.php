<?php

namespace App\Repository;

use App\Entity\SportArticle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SportArticle|null find($id, $lockMode = null, $lockVersion = null)
 * @method SportArticle|null findOneBy(array $criteria, array $orderBy = null)
 * @method SportArticle[]    findAll()
 * @method SportArticle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SportArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SportArticle::class);
    }

    // /**
    //  * @return SportArticle[] Returns an array of SportArticle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SportArticle
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
