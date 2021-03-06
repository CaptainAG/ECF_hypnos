<?php

namespace App\Repository;

use App\Entity\Hotel;
use App\Entity\Suite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Suite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Suite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Suite[]    findAll()
 * @method Suite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SuiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Suite::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Suite $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Suite $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }


    public function findByHotelID($id){
       
        $query= $this->createQueryBuilder('d')
            ->select('d')
            ->where('d.hotel = :hotel')
            ->setParameter('hotel', $id );
            
        ;
        
        return $query->getQuery()->getResult();
    }

    public function getPaginatedSuites($page, $limit,$id){
        $query= $this->createQueryBuilder('s')
            ->select('s')
            ->where('s.hotel = :hotel')
            ->setParameter('hotel', $id )
            ->orderBy('s.id')
            ->setFirstResult(($page * $limit) - $limit)
            ->setMaxResults($limit)
        ;

        return $query->getQuery()->getResult();
    }  
    
    
    public function getTotalSuites($id){
        $query= $this->createQueryBuilder('s')
            ->select('COUNT(s)')
            ->where('s.hotel = :hotel')
            ->setParameter('hotel', $id )
        ;

        return $query->getQuery()->getSingleScalarResult();
    }

    // /**
    //  * @return Suite[] Returns an array of Suite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Suite
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
