<?php

namespace App\Repository;

use App\Entity\HorairesOuvertures;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HorairesOuvertures>
 *
 * @method HorairesOuvertures|null find($id, $lockMode = null, $lockVersion = null)
 * @method HorairesOuvertures|null findOneBy(array $criteria, array $orderBy = null)
 * @method HorairesOuvertures[]    findAll()
 * @method HorairesOuvertures[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HorairesOuverturesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HorairesOuvertures::class);
    }

    public function add(HorairesOuvertures $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(HorairesOuvertures $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return HorairesOuvertures[] Returns an array of HorairesOuvertures objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('h.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?HorairesOuvertures
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
