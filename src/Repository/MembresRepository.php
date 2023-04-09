<?php

namespace App\Repository;

use App\Entity\Membres;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Membres>
 *
 * @method Membres|null find($id, $lockMode = null, $lockVersion = null)
 * @method Membres|null findOneBy(array $criteria, array $orderBy = null)
 * @method Membres[]    findAll()
 * @method Membres[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MembresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Membres::class);
    }

    public function save(Membres $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Membres $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findByEmailAuth($email)
    {
        return $this->createQueryBuilder('me')
            ->select('me.email','me.password', 'me.numMembres')
            ->where('me.email = :email')
            ->setParameter('email', $email)
            ->getQuery()
            ->getResult();
    }


//    /**
//     * @return Membres[] Returns an array of Membres objects
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

//    public function findOneBySomeField($value): ?Membres
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
