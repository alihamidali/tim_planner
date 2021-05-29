<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Destination
 *
 * @ORM\Table(name="destination", indexes={@ORM\Index(name="IDX_3EC63EAA8BAC62AF", columns={"city_id"}), @ORM\Index(name="IDX_3EC63EAADE95C867", columns={"sector_id"}), @ORM\Index(name="IDX_3EC63EAAF92F3E70", columns={"country_id"})})
 * @ORM\Entity
 */
class Destination
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=300, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="main_photo", type="string", length=300, nullable=true)
     */
    private $mainPhoto;

    /**
     * @var string|null
     *
     * @ORM\Column(name="photo_two", type="string", length=300, nullable=true)
     */
    private $photoTwo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="photo_three", type="string", length=300, nullable=true)
     */
    private $photoThree;

    /**
     * @var string|null
     *
     * @ORM\Column(name="website", type="string", length=300, nullable=true)
     */
    private $website;

    /**
     * @var string|null
     *
     * @ORM\Column(name="google_map_link", type="string", length=300, nullable=true)
     */
    private $googleMapLink;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=1000, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="opening_time", type="string", length=30, nullable=false)
     */
    private $openingTime;

    /**
     * @var string
     *
     * @ORM\Column(name="closing_time", type="string", length=30, nullable=false)
     */
    private $closingTime;

    /**
     * @var City
     *
     * @ORM\ManyToOne(targetEntity="City")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     * })
     */
    private $city;

    /**
     * @var Sector
     *
     * @ORM\ManyToOne(targetEntity="Sector")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sector_id", referencedColumnName="id")
     * })
     */
    private $sector;

    /**
     * @var Country
     *
     * @ORM\ManyToOne(targetEntity="Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     * })
     */
    private $country;


}
