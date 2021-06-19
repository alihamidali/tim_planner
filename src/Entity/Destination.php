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
    protected $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=300, nullable=true)
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
     * @ORM\Column(name="point_of_interest", type="string", length=300, nullable=true)
     */
    private $pointOfInterest;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address", type="text", nullable=true)
     */
    private $address;

    /**
     * @var string|null
     *
     * @ORM\Column(name="longitude", type="string", length=300, nullable=true)
     */
    private $longitude;

    /**
     * @var string|null
     *
     * @ORM\Column(name="latitude", type="string", length=300, nullable=true)
     */
    private $latitude;

    /**
     * @var boolean|null
     *
     * @ORM\Column(name="is_open_on_monday", type="boolean", nullable=true)
     */
    private $isOpenOnMonday;

    /**
     * @var boolean|null
     *
     * @ORM\Column(name="is_open_on_tuesday", type="boolean", nullable=true)
     */
    private $isOpenOnTuesday;

    /**
     * @var boolean|null
     *
     * @ORM\Column(name="is_open_on_wednesday", type="boolean", nullable=true)
     */
    private $isOpenOnWednesday;

    /**
     * @var boolean|null
     *
     * @ORM\Column(name="is_open_on_thursday", type="boolean", nullable=true)
     */
    private $isOpenOnThursday;

    /**
     * @var boolean|null
     *
     * @ORM\Column(name="is_open_on_friday", type="boolean", nullable=true)
     */
    private $isOpenOnFriday;

    /**
     * @var boolean|null
     *
     * @ORM\Column(name="is_open_on_saturday", type="boolean", nullable=true)
     */
    private $isOpenOnSaturday;

    /**
     * @var boolean|null
     *
     * @ORM\Column(name="is_open_on_sunday", type="boolean", nullable=true)
     */
    private $isOpenOnSunday;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="monday_open_time", type="time", nullable=true)
     */
    private $mondayOpenTime;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="tuesday_open_time", type="time", nullable=true)
     */
    private $tuesdayOpenTime;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="wednesday_open_time", type="time", nullable=true)
     */
    private $wednesdayOpenTime;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="thursday_open_time", type="time", nullable=true)
     */
    private $thursdayOpenTime;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="friday_open_time", type="time", nullable=true)
     */
    private $fridayOpenTime;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="saturday_open_time", type="time", nullable=true)
     */
    private $saturdayOpenTime;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="sunday_open_time", type="time", nullable=true)
     */
    private $sundayOpenTime;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="monday_close_time", type="time", nullable=true)
     */
    private $mondayCloseTime;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="tuesday_close_time", type="time", nullable=true)
     */
    private $tuesdayCloseTime;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="wednesday_close_time", type="time", nullable=true)
     */
    private $wednesdayCloseTime;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="thursday_close_time", type="time", nullable=true)
     */
    private $thursdayCloseTime;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="friday_close_time", type="time", nullable=true)
     */
    private $fridayCloseTime;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="saturday_close_time", type="time", nullable=true)
     */
    private $saturdayCloseTime;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="sunday_close_time", type="time", nullable=true)
     */
    private $sundayCloseTime;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tickets", type="string", length=300, nullable=true)
     */
    private $tickets;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone", type="string", length=300, nullable=true)
     */
    private $phone;

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
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="description2", type="text", nullable=true)
     */
    private $description2;

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

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getMainPhoto(): ?string
    {
        return $this->mainPhoto;
    }

    /**
     * @param string|null $mainPhoto
     */
    public function setMainPhoto(?string $mainPhoto): void
    {
        $this->mainPhoto = $mainPhoto;
    }

    /**
     * @return string|null
     */
    public function getPointOfInterest(): ?string
    {
        return $this->pointOfInterest;
    }

    /**
     * @param string|null $pointOfInterest
     */
    public function setPointOfInterest(?string $pointOfInterest): void
    {
        $this->pointOfInterest = $pointOfInterest;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     */
    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string|null
     */
    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    /**
     * @param string|null $longitude
     */
    public function setLongitude(?string $longitude): void
    {
        $this->longitude = $longitude;
    }

    /**
     * @return string|null
     */
    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    /**
     * @param string|null $latitude
     */
    public function setLatitude(?string $latitude): void
    {
        $this->latitude = $latitude;
    }

    /**
     * @return string|null
     */
    public function getTickets(): ?string
    {
        return $this->tickets;
    }

    /**
     * @param string|null $tickets
     */
    public function setTickets(?string $tickets): void
    {
        $this->tickets = $tickets;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string|null
     */
    public function getPhotoTwo(): ?string
    {
        return $this->photoTwo;
    }

    /**
     * @param string|null $photoTwo
     */
    public function setPhotoTwo(?string $photoTwo): void
    {
        $this->photoTwo = $photoTwo;
    }

    /**
     * @return string|null
     */
    public function getPhotoThree(): ?string
    {
        return $this->photoThree;
    }

    /**
     * @param string|null $photoThree
     */
    public function setPhotoThree(?string $photoThree): void
    {
        $this->photoThree = $photoThree;
    }

    /**
     * @return string|null
     */
    public function getWebsite(): ?string
    {
        return $this->website;
    }

    /**
     * @param string|null $website
     */
    public function setWebsite(?string $website): void
    {
        $this->website = $website;
    }

    /**
     * @return string|null
     */
    public function getGoogleMapLink(): ?string
    {
        return $this->googleMapLink;
    }

    /**
     * @param string|null $googleMapLink
     */
    public function setGoogleMapLink(?string $googleMapLink): void
    {
        $this->googleMapLink = $googleMapLink;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription2(): string
    {
        return $this->description2;
    }

    /**
     * @param string $description2
     */
    public function setDescription2(string $description2): void
    {
        $this->description2 = $description2;
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
     * @return Sector
     */
    public function getSector(): Sector
    {
        return $this->sector;
    }

    /**
     * @param Sector $sector
     */
    public function setSector(Sector $sector): void
    {
        $this->sector = $sector;
    }

    /**
     * @return Country|null
     */
    public function getCountry(): ?Country
    {
        return $this->country;
    }

    /**
     * @param Country $country
     */
    public function setCountry(Country $country): void
    {
        $this->country = $country;
    }

    /**
     * @return bool|null
     */
    public function getIsOpenOnMonday(): ?bool
    {
        return $this->isOpenOnMonday;
    }

    /**
     * @param bool|null $isOpenOnMonday
     */
    public function setIsOpenOnMonday(?bool $isOpenOnMonday): void
    {
        $this->isOpenOnMonday = $isOpenOnMonday;
    }

    /**
     * @return bool|null
     */
    public function getIsOpenOnTuesday(): ?bool
    {
        return $this->isOpenOnTuesday;
    }

    /**
     * @param bool|null $isOpenOnTuesday
     */
    public function setIsOpenOnTuesday(?bool $isOpenOnTuesday): void
    {
        $this->isOpenOnTuesday = $isOpenOnTuesday;
    }

    /**
     * @return bool|null
     */
    public function getIsOpenOnWednesday(): ?bool
    {
        return $this->isOpenOnWednesday;
    }

    /**
     * @param bool|null $isOpenOnWednesday
     */
    public function setIsOpenOnWednesday(?bool $isOpenOnWednesday): void
    {
        $this->isOpenOnWednesday = $isOpenOnWednesday;
    }

    /**
     * @return bool|null
     */
    public function getIsOpenOnThursday(): ?bool
    {
        return $this->isOpenOnThursday;
    }

    /**
     * @param bool|null $isOpenOnThursday
     */
    public function setIsOpenOnThursday(?bool $isOpenOnThursday): void
    {
        $this->isOpenOnThursday = $isOpenOnThursday;
    }

    /**
     * @return bool|null
     */
    public function getIsOpenOnFriday(): ?bool
    {
        return $this->isOpenOnFriday;
    }

    /**
     * @param bool|null $isOpenOnFriday
     */
    public function setIsOpenOnFriday(?bool $isOpenOnFriday): void
    {
        $this->isOpenOnFriday = $isOpenOnFriday;
    }

    /**
     * @return bool|null
     */
    public function getIsOpenOnSaturday(): ?bool
    {
        return $this->isOpenOnSaturday;
    }

    /**
     * @param bool|null $isOpenOnSaturday
     */
    public function setIsOpenOnSaturday(?bool $isOpenOnSaturday): void
    {
        $this->isOpenOnSaturday = $isOpenOnSaturday;
    }

    /**
     * @return bool|null
     */
    public function getIsOpenOnSunday(): ?bool
    {
        return $this->isOpenOnSunday;
    }

    /**
     * @param bool|null $isOpenOnSunday
     */
    public function setIsOpenOnSunday(?bool $isOpenOnSunday): void
    {
        $this->isOpenOnSunday = $isOpenOnSunday;
    }

    /**
     * @return string|null
     */
    public function getMondayOpenTime(): ?string
    {
        return $this->mondayOpenTime->format('h:i A');
    }

    /**
     * @param \DateTime|null $mondayOpenTime
     */
    public function setMondayOpenTime(?\DateTime $mondayOpenTime): void
    {
        $this->mondayOpenTime = $mondayOpenTime;
    }

    /**
     * @return string|null
     */
    public function getTuesdayOpenTime(): ?string
    {
        return $this->tuesdayOpenTime->format('h:i A');
    }

    /**
     * @param \DateTime|null $tuesdayOpenTime
     */
    public function setTuesdayOpenTime(?\DateTime $tuesdayOpenTime): void
    {
        $this->tuesdayOpenTime = $tuesdayOpenTime;
    }

    /**
     * @return string|null
     */
    public function getWednesdayOpenTime(): ?string
    {
        return $this->wednesdayOpenTime->format('h:i A');
    }

    /**
     * @param \DateTime|null $wednesdayOpenTime
     */
    public function setWednesdayOpenTime(?\DateTime $wednesdayOpenTime): void
    {
        $this->wednesdayOpenTime = $wednesdayOpenTime;
    }

    /**
     * @return string|null
     */
    public function getThursdayOpenTime(): ?string
    {
        return $this->thursdayOpenTime->format('h:i A');
    }

    /**
     * @param \DateTime|null $thursdayOpenTime
     */
    public function setThursdayOpenTime(?\DateTime $thursdayOpenTime): void
    {
        $this->thursdayOpenTime = $thursdayOpenTime;
    }

    /**
     * @return string|null
     */
    public function getFridayOpenTime(): ?string
    {
        return $this->fridayOpenTime->format('h:i A');
    }

    /**
     * @param \DateTime|null $fridayOpenTime
     */
    public function setFridayOpenTime(?\DateTime $fridayOpenTime): void
    {
        $this->fridayOpenTime = $fridayOpenTime;
    }

    /**
     * @return string|null
     */
    public function getSaturdayOpenTime(): ?string
    {
        return $this->saturdayOpenTime->format('h:i A');
    }

    /**
     * @param \DateTime|null $saturdayOpenTime
     */
    public function setSaturdayOpenTime(?\DateTime $saturdayOpenTime): void
    {
        $this->saturdayOpenTime = $saturdayOpenTime;
    }

    /**
     * @return string|null
     */
    public function getSundayOpenTime(): ?string
    {
        return $this->sundayOpenTime->format('h:i A');
    }

    /**
     * @param \DateTime|null $sundayOpenTime
     */
    public function setSundayOpenTime(?\DateTime $sundayOpenTime): void
    {
        $this->sundayOpenTime = $sundayOpenTime;
    }

    /**
     * @return string|null
     */
    public function getMondayCloseTime(): ?string
    {
        return $this->mondayCloseTime->format('h:i A');
    }

    /**
     * @param \DateTime|null $mondayCloseTime
     */
    public function setMondayCloseTime(?\DateTime $mondayCloseTime): void
    {
        $this->mondayCloseTime = $mondayCloseTime;
    }

    /**
     * @return string|null
     */
    public function getTuesdayCloseTime(): ?string
    {
        return $this->tuesdayCloseTime->format('h:i A');
    }

    /**
     * @param \DateTime|null $tuesdayCloseTime
     */
    public function setTuesdayCloseTime(?\DateTime $tuesdayCloseTime): void
    {
        $this->tuesdayCloseTime = $tuesdayCloseTime;
    }

    /**
     * @return string|null
     */
    public function getWednesdayCloseTime(): ?string
    {
        return $this->wednesdayCloseTime->format('h:i A');
    }

    /**
     * @param \DateTime|null $wednesdayCloseTime
     */
    public function setWednesdayCloseTime(?\DateTime $wednesdayCloseTime): void
    {
        $this->wednesdayCloseTime = $wednesdayCloseTime;
    }

    /**
     * @return string|null
     */
    public function getThursdayCloseTime(): ?string
    {
        return $this->thursdayCloseTime->format('h:i A');
    }

    /**
     * @param \DateTime|null $thursdayCloseTime
     */
    public function setThursdayCloseTime(?\DateTime $thursdayCloseTime): void
    {
        $this->thursdayCloseTime = $thursdayCloseTime;
    }

    /**
     * @return string|null
     */
    public function getFridayCloseTime(): ?string
    {
        return $this->fridayCloseTime->format('h:i A');
    }

    /**
     * @param \DateTime|null $fridayCloseTime
     */
    public function setFridayCloseTime(?\DateTime $fridayCloseTime): void
    {
        $this->fridayCloseTime = $fridayCloseTime;
    }

    /**
     * @return string|null
     */
    public function getSaturdayCloseTime(): ?string
    {
        return $this->saturdayCloseTime->format('h:i A');
    }

    /**
     * @param \DateTime|null $saturdayCloseTime
     */
    public function setSaturdayCloseTime(?\DateTime $saturdayCloseTime): void
    {
        $this->saturdayCloseTime = $saturdayCloseTime;
    }

    /**
     * @return string|null
     */
    public function getSundayCloseTime(): ?string
    {
        return $this->sundayCloseTime->format('h:i A');
    }

    /**
     * @param \DateTime|null $sundayCloseTime
     */
    public function setSundayCloseTime(?\DateTime $sundayCloseTime): void
    {
        $this->sundayCloseTime = $sundayCloseTime;
    }

}
