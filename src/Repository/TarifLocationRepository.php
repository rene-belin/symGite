<?php

namespace App\Repository;

use App\Entity\TarifLocation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TarifLocation>
 *
 * @method TarifLocation|null find($id, $lockMode = null, $lockVersion = null)
 * @method TarifLocation|null findOneBy(array $criteria, array $orderBy = null)
 * @method TarifLocation[]    findAll()
 * @method TarifLocation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TarifLocationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TarifLocation::class);
    }

//    /**
//     * @return TarifLocation[] Returns an array of TarifLocation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TarifLocation
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
