<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Sector
 *
 * @ORM\Table(name="sector")
 * @ORM\Entity
 */
class Sector
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30, nullable=false)
     */
    private $name;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="Business", mappedBy="sector")
     */
    private $businesses;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="Traveller", mappedBy="favoriteHangoutPlace")
     */
    private $travellerFavorites;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Collection
     */
    public function getBusinesses(): Collection
    {
        return $this->businesses;
    }

    /**
     * @param Collection $businesses
     */
    public function setBusinesses(Collection $businesses): void
    {
        $this->businesses = $businesses;
    }

}
