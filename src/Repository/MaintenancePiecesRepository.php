<?php

namespace App\Repository;

use App\Entity\MaintenancePieces;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MaintenancePieces>
 *
 * @method MaintenancePieces|null find($id, $lockMode = null, $lockVersion = null)
 * @method MaintenancePieces|null findOneBy(array $criteria, array $orderBy = null)
 * @method MaintenancePieces[]    findAll()
 * @method MaintenancePieces[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaintenancePiecesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MaintenancePieces::class);
    }

    public function save(MaintenancePieces $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(MaintenancePieces $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return MaintenancePieces[] Returns an array of MaintenancePieces objects
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

//    public function findOneBySomeField($value): ?MaintenancePieces
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
