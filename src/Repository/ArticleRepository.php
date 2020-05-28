<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    // /**
    //  * @return Article[] Returns an array of Article objects
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
    public function findOneBySomeField($value): ?Article
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
  // public function findOne($value)
  // {
  //     return $this->createQueryBuilder('a')
  //         ->andWhere('a.id = :val')
  //         ->setParameter('val', $value)
  //         ->getQuery()
  //         ->getResult();
  // }

    // /**
    //  * @return Article[] Returns an array of last 5 Article objects
    //  */
  public function findByLastFive()
  {
      return $this->createQueryBuilder('a')
       
          ->orderBy('a.id', 'DESC')
          ->setMaxResults(5)
          ->getQuery()
          ->getResult()
      ;
  }
  
   // /**
    //  * @return Article[] Returns an array of Article objects
    //  */
    
    public function findBySearchString($data)
    {
        return $this->createQueryBuilder('a')
            ->orWhere('a.title LIKE :val')
            ->orWhere('a.short_content LIKE :val')
            ->orWhere('a.content LIKE :val')
            ->setParameter('val', '%'.$data.'%')
            ->getQuery()
            ->getResult()
        ;
    }
}