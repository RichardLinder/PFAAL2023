<?php

namespace App\Repository;

use App\Entity\Metal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Metal>
 *
 * @method Metal|null find($id, $lockMode = null, $lockVersion = null)
 * @method Metal|null findOneBy(array $criteria, array $orderBy = null)
 * @method Metal[]    findAll()
 * @method Metal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MetalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Metal::class);
    }

//    /**
//     * @return Metal[] Returns an array of Metal objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Metal
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
