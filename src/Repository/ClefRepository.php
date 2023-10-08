<?php

namespace App\Repository;

use App\Entity\Clef;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Clef>
 *
 * @method Clef|null find($id, $lockMode = null, $lockVersion = null)
 * @method Clef|null findOneBy(array $criteria, array $orderBy = null)
 * @method Clef[]    findAll()
 * @method Clef[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClefRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Clef::class);
    }

//    /**
//     * @return Clef[] Returns an array of Clef objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Clef
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
