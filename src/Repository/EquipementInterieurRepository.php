<?php

namespace App\Repository;

use App\Entity\EquipementInterieur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EquipementInterieur|null find($id, $lockMode = null, $lockVersion = null)
 * @method EquipementInterieur|null findOneBy(array $criteria, array $orderBy = null)
 * @method EquipementInterieur[]    findAll()
 * @method EquipementInterieur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipementInterieurRepository extends ServiceEntityRepository {
    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, EquipementInterieur::class);
    }

    /**
     * Ajoute une entité EquipementInterieur.
     *
     * @param EquipementInterieur $entity
     * @param bool $flush
     */
    public function add(EquipementInterieur $entity, bool $flush = false): void {
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
     * Supprime une entité EquipementInterieur.
     *
     * @param EquipementInterieur $entity
     * @param bool $flush
     */
    public function remove(EquipementInterieur $entity, bool $flush = false): void {
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
