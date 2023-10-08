<?php

namespace App\Repository;

use App\Entity\Bois;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Bois>
 *
 * @method Bois|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bois|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bois[]    findAll()
 * @method Bois[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BoisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bois::class);
    }

//    /**
//     * @return Bois[] Returns an array of Bois objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Bois
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
