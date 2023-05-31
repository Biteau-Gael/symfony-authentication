<?php

namespace App\Repository;

use App\Entity\VoitureOccasion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VoitureOccasion>
 *
 * @method VoitureOccasion|null find($id, $lockMode = null, $lockVersion = null)
 * @method VoitureOccasion|null findOneBy(array $criteria, array $orderBy = null)
 * @method VoitureOccasion[]    findAll()
 * @method VoitureOccasion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoitureOccasionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VoitureOccasion::class);
    }

    public function add(VoitureOccasion $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(VoitureOccasion $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    // src/Repository/VoitureOccasionRepository.php

    public function filter($minPrix, $maxPrix, $minKilometre, $maxKilometre, $minAnnee, $maxAnnee)
    {
        $qb = $this->createQueryBuilder('v');

        if ($minPrix) {
            $qb->andWhere('v.prix >= :minPrix')
                ->setParameter('minPrix', $minPrix);
        }

        if ($maxPrix) {
            $qb->andWhere('v.prix <= :maxPrix')
                ->setParameter('maxPrix', $maxPrix);
        }

        if ($minKilometre) {
            $qb->andWhere('v.Kilometre >= :minKilometre')
                ->setParameter('minKilometre', $minKilometre);
        }

        if ($maxKilometre) {
            $qb->andWhere('v.Kilometre <= :maxKilometre')
                ->setParameter('maxKilometre', $maxKilometre);
        }

        if ($minAnnee) {
            $qb->andWhere('v.annee >= :minAnnee')
                ->setParameter('minAnnee', $minAnnee);
        }

        if ($maxAnnee) {
            $qb->andWhere('v.annee <= :maxAnnee')
                ->setParameter('maxAnnee', $maxAnnee);
        }

        return $qb->getQuery()->getResult();
    }


//    /**
//     * @return VoitureOccasion[] Returns an array of VoitureOccasion objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?VoitureOccasion
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
