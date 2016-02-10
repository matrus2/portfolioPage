<?php
namespace Mtu\PortfolioBundle\Repository;
use Doctrine\ORM\EntityRepository;

class WorksRepository extends EntityRepository{
    
    public function findAl()
    {
        return $this->findBy(array(), array('id' => 'DESC'));
    }
    
    public function getThreeWorks(){
        
        $qb = $this->createQueryBuilder('w')
                    ->orderBy('w.id','DESC')
                    ->setMaxResults('3');
        return $qb->getQuery()->execute();
    }
    public function getLastWork(){
        
        $qb = $this->createQueryBuilder('w')
                    ->setMaxResults(1);
        return $qb->getQuery()->getSingleResult();
    }
    
    public function getContactDane(){
       
        $qb = $this->createQueryBuilder('w')
                   ->select('w.dane, w.pathA');
        return $qb->getQuery()->execute();
        }
    public function getContactEmail(){
       
        $qb = $this->createQueryBuilder('p')
                   ->select('p.email');
        return $qb->getQuery()->getSingleResult();
        }
    
}
