<?php

namespace App\Repository;

use App\Entity\EquipementExterieur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EquipementExterieur|null find($id, $lockMode = null, $lockVersion = null)
 * @method EquipementExterieur|null findOneBy(array $criteria, array $orderBy = null)
 * @method EquipementExterieur[]    findAll()
 * @method EquipementExterieur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipementExterieurRepository extends ServiceEntityRepository {
    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, EquipementExterieur::class);
    }

    /**
     * Ajoute une entité EquipementExterieur.
     *
     * @param EquipementExterieur $entity
     * @param bool $flush
     */
    public function add(EquipementExterieur $entity, bool $flush = false): void {
        $em = $this->getEntityManager();
        $em->beginTransaction();

        try {
            $em->persist($entity);

            if($flush) {
                $em->flush();
            }

            $em->commit();
        } catch (\Exception $e) {
            $em->rollback();
            throw $e;
        }
    }

    /**
     * Supprime une entité EquipementExterieur.
     *
     * @param EquipementExterieur $entity
     * @param bool $flush
     */
    public function remove(EquipementExterieur $entity, bool $flush = false): void {
        $em = $this->getEntityManager();
        $em->beginTransaction();

        try {
            $em->remove($entity);

            if($flush) {
                $em->flush();
            }

            $em->commit();
        } catch (\Exception $e) {
            $em->rollback();
            throw $e;
        }
    }
}
