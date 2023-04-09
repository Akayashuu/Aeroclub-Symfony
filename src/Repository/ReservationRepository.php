<?php

namespace App\Repository;

use App\Entity\Reservation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Reservation>
 *
 * @method Reservation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reservation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reservation[]    findAll()
 * @method Reservation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReservationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reservation::class);
    }

    public function save(Reservation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Reservation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function checkAvionReservationConflict(\DateTime $scheduledAt, \DateTime $endAt, int $numavions): bool
    {
        $qb = $this->createQueryBuilder('r');
        $qb->andWhere($qb->expr()->eq('r.numavions', ':numavions'))
        ->andWhere($qb->expr()->orX(
            $qb->expr()->andX(
                $qb->expr()->lte('r.scheduledAt', ':scheduledAt'),
                $qb->expr()->gte('r.endAt', ':scheduledAt')
            ),
            $qb->expr()->andX(
                $qb->expr()->lte('r.scheduledAt', ':endAt'),
                $qb->expr()->gte('r.endAt', ':endAt')
            )
        ))
        ->setParameter('numavions', $numavions)
        ->setParameter('scheduledAt', $scheduledAt)
        ->setParameter('endAt', $endAt);

        $result = $qb->getQuery()->getResult();

        return count($result) > 0;
    }

    public function checkMembreReservationConflict(\DateTime $scheduledAt, \DateTime $endAt, int $numMembres): bool
    {
        $qb = $this->createQueryBuilder('r');

        $qb->andWhere('r.numMembres = :numMembres')
            ->setParameter('numMembres', $numMembres)
            ->andWhere('((r.scheduledAt >= :scheduledAt AND r.scheduledAt < :endAt) OR (r.endAt > :scheduledAt AND r.endAt <= :endAt) OR (r.scheduledAt <= :scheduledAt AND r.endAt >= :endAt))')
            ->setParameter('scheduledAt', $scheduledAt)
            ->setParameter('endAt', $endAt);

        $result = $qb->getQuery()->getResult();

        return count($result) > 0;
    }

//    /**
//     * @return Reservation[] Returns an array of Reservation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Reservation
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
