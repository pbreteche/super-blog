<?php

namespace App\Repository;

use App\Entity\Publication;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Publication|null find($id, $lockMode = null, $lockVersion = null)
 * @method Publication|null findOneBy(array $criteria, array $orderBy = null)
 * @method Publication[]    findAll()
 * @method Publication[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PublicationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Publication::class);
    }

    /**
     * @return Publication[]
     */
    public function findPubliees(): array
    {
        return $this->getEntityManager()->createQuery(
            'SELECT p FROM '.Publication::class.' p '
            .'WHERE p.etat = \'publie\' '
            .'ORDER BY p.publieeLe DESC'
        )->getResult();
    }

    // /**
    //  * @return Publication[] Returns an array of Publication objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */


    public function findOneBySomeField($value): ?Publication
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    /**
     * @return Publication[]
     */
    public function findBrouillons()
    {
        return $this->getEntityManager()->createQuery(
            'SELECT p FROM '.Publication::class.' p '
            .'WHERE p.etat = \'brouillon\' '
            .'ORDER BY p.publieeLe DESC'
        )->getResult();
    }

    /**
     * @return Publication[]
     */
    public function findMemeAuteur(Publication $publication) {
        return $this->createQueryBuilder('p')
            ->andWhere('p.ecritPar = :auteur')
            ->andWhere('p <> :publication')
            ->orderBy('p.publieeLe', 'DESC')
            ->getQuery()
            ->setParameters([
                'auteur' => $publication->getEcritPar(),
                'publication' => $publication
            ])
            ->getResult();
    }
}
