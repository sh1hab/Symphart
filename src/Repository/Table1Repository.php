<?php

namespace App\Repository;

use App\Entity\Table1;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Table1|null find($id, $lockMode = null, $lockVersion = null)
 * @method Table1|null findOneBy(array $criteria, array $orderBy = null)
 * @method Table1[]    findAll()
 * @method Table1[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Table1Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Table1::class);
    }

    // /**
    //  * @return Table1[] Returns an array of Table1 objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Table1
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
