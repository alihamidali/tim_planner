<?php

namespace App\Repository;

use App\Entity\TravelPlan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class TravelPlanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TravelPlan::class);
    }

    public function save(TravelPlan $travelPlan)
    {
        $this->getEntityManager()->persist($travelPlan);
        $this->getEntityManager()->flush();
    }
}