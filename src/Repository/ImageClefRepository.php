<?php

namespace App\Repository;

use App\Entity\ImageClef;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ImageClef>
 *
 * @method ImageClef|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageClef|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageClef[]    findAll()
 * @method ImageClef[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageClefRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImageClef::class);
    }

//    /**
//     * @return ImageClef[] Returns an array of ImageClef objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ImageClef
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
