<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class TravelPlan
 * @package App\Entity
 * @ORM\Entity()
 */
class TravelPlan
{
    /**
     * @var int
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     */
    protected $id;
    /**
     * @var Traveller
     * @ORM\ManyToOne(targetEntity="Traveller", inversedBy="plans")
     * @ORM\JoinColumn(name="traveller_id", referencedColumnName="id")
     */
    private $traveller;
    /**
     * @var \DateTime
     * @ORM\Column(name="start_date", type="datetime", nullable=true)
     */
    private $startDate;
    /**
     * @var \DateTime
     * @ORM\Column(name="end_date", type="datetime", nullable=true)
     */
    private $endDate;
    /**
     * @var int
     * @ORM\Column(name="time_allocated_per_day", type="integer", nullable=true)
     */
    private $timeAllocatedPerDay;
    /**
     * @var City
     * @ORM\ManyToOne(targetEntity="City", inversedBy="plans")
     * @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     */
    private $city;
    /**
     * @var array
     * @ORM\Column(name="plan", type="json", nullable=true)
     */
    private $plan;
    /**
     * @var \DateTime
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;
    /**
     * @var \DateTime
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return Traveller
     */
    public function getTraveller(): Traveller
    {
        return $this->traveller;
    }

    /**
     * @param Traveller $traveller
     */
    public function setTraveller(Traveller $traveller): void
    {
        $this->traveller = $traveller;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate(): ?\DateTime
    {
        return $this->startDate;
    }

    /**
     * @param \DateTime $startDate
     */
    public function setStartDate(\DateTime $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate(): ?\DateTime
    {
        return $this->endDate;
    }

    /**
     * @param \DateTime $endDate
     */
    public function setEndDate(\DateTime $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return int
     */
    public function getTimeAllocatedPerDay(): int
    {
        return $this->timeAllocatedPerDay;
    }

    /**
     * @param int $timeAllocatedPerDay
     */
    public function setTimeAllocatedPerDay(int $timeAllocatedPerDay): void
    {
        $this->timeAllocatedPerDay = $timeAllocatedPerDay;
    }

    /**
     * @return City
     */
    public function getCity(): City
    {
        return $this->city;
    }

    /**
     * @param City $city
     */
    public function setCity(City $city): void
    {
        $this->city = $city;
    }

    /**
     * @return array
     */
    public function getPlan(): array
    {
        return $this->plan;
    }

    /**
     * @param array $plan
     */
    public function setPlan(array $plan): void
    {
        $this->plan = $plan;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

}
