<?php

namespace App\Repository;

use App\Entity\Reservation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
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

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Reservation $entity, bool $flush = true): void
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
    public function remove(Reservation $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function findByUserID($id){
       
        $query= $this->createQueryBuilder('d')
            ->select('d')
            ->where('d.user = :user')
            ->setParameter('user', $id );
            
        ;
        
        return $query->getQuery()->getResult();
    }

    public function findByHotelId($id){
       
        $query= $this->createQueryBuilder('d')
            ->select('d')
            ->where('d.hotel = :hotel')
            ->setParameter('hotel', $id );
            
        ;
        
        return $query->getQuery()->getResult();
    }



    public function getPaginatedReservations($page, $limit,$id){
        $query= $this->createQueryBuilder('r')
            ->select('r')
            ->where('r.user = :user')
            ->setParameter('user', $id )
            ->orderBy('r.startDate', 'desc')
            ->setFirstResult(($page * $limit) - $limit)
            ->setMaxResults($limit)
        ;

        return $query->getQuery()->getResult();
    }  
    
    
    public function getTotalReservations($id){
        $query= $this->createQueryBuilder('r')
            ->select('COUNT(r)')
            ->where('r.user = :user')
            ->setParameter('user', $id )
        ;

        return $query->getQuery()->getSingleScalarResult();
    }

    public function disponible($suite,$startDate,$endDate){
       
        $query= $this->createQueryBuilder('r')
            ->select('r')
            ->where('r.suite = :suite')
            ->setParameter('suite', $suite )
            ->andWhere('r.startDate BETWEEN :startDate AND :endDate')
            ->setParameter('startDate', $startDate )
            ->setParameter('endDate', $endDate );
            
        ;
        
        return $query->getQuery()->getResult();
    }


    /*

    public function free($suite,$start,$end){
        $query= $this->createQueryBuilder('d')
        ->select('d')
        ->where('d.suite = :suite')
        ->andWhere('d.startDate BETWEEN :start AND :end')
        ->setParameter('suite', $suite)
        ->setParameter('start', $start)
        ->setParameter('end', $end);
    }
    */
    // /**
    //  * @return Reservation[] Returns an array of Reservation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Reservation
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
