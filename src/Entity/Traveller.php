<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Traveller
 *
 * @ORM\Table(name="traveller", indexes={@ORM\Index(name="IDX_92E7B427FE5D6CDA", columns={"traveller_category_id"}), @ORM\Index(name="IDX_92E7B4271C9DA55", columns={"nationality_id"})})
 * @ORM\Entity
 */
class Traveller implements UserInterface
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
     * @ORM\Column(name="first_name", type="string", length=300, nullable=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=300, nullable=false)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="user_name", type="string", length=300, nullable=false)
     */
    private $userName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_of_birth", type="datetime", nullable=false)
     */
    private $dateOfBirth;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=300, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile_no", type="string", length=20, nullable=false)
     */
    private $mobileNo;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_no", type="text", length=0, nullable=false)
     */
    private $phoneNo;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=0, nullable=false)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=300, nullable=false)
     */
    private $photo;

    /**
     * @var Country
     *
     * @ORM\ManyToOne(targetEntity="Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nationality_id", referencedColumnName="id")
     * })
     */
    private $nationality;

    /**
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="City", inversedBy="travellers", cascade={"persist"})
     * @ORM\JoinTable(name="traveller_cities")
     */
    private $cities;

    /**
     * @var TravellerCategory
     *
     * @ORM\ManyToOne(targetEntity="TravellerCategory", inversedBy="travellers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="traveller_category_id", referencedColumnName="id")
     * })
     */
    private $travellerCategory;

    /**
     * @var Sector
     *
     * @ORM\ManyToOne(targetEntity="Sector", inversedBy="travellerFavorites")
     */
    private $favoriteHangoutPlace;

    /**
     * @var string|null
     *
     * @ORM\Column(name="favorite_cuisine", type="string", nullable=true)
     */
    private $favoriteCuisine;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dream_holiday", type="string", nullable=true)
     */
    private $dreamHoliday;

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
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateOfBirth(): ?\DateTime
    {
        return $this->dateOfBirth;
    }

    /**
     * @param \DateTime $dateOfBirth
     */
    public function setDateOfBirth(\DateTime $dateOfBirth): void
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getMobileNo(): string
    {
        return $this->mobileNo;
    }

    /**
     * @param string $mobileNo
     */
    public function setMobileNo(string $mobileNo): void
    {
        $this->mobileNo = $mobileNo;
    }

    /**
     * @return string
     */
    public function getPhoneNo(): string
    {
        return $this->phoneNo;
    }

    /**
     * @param string $phoneNo
     */
    public function setPhoneNo(string $phoneNo): void
    {
        $this->phoneNo = $phoneNo;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getPhoto(): string
    {
        return $this->photo;
    }

    /**
     * @param string $photo
     */
    public function setPhoto(string $photo): void
    {
        $this->photo = $photo;
    }

    /**
     * @return Country|null
     */
    public function getNationality(): ?Country
    {
        return $this->nationality;
    }

    /**
     * @param Country $nationality
     */
    public function setNationality(Country $nationality): void
    {
        $this->nationality = $nationality;
    }

    /**
     * @return TravellerCategory|null
     */
    public function getTravellerCategory(): ?TravellerCategory
    {
        return $this->travellerCategory;
    }

    /**
     * @param TravellerCategory $travellerCategory
     */
    public function setTravellerCategory(TravellerCategory $travellerCategory): void
    {
        $this->travellerCategory = $travellerCategory;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     */
    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    /**
     * @return Collection
     */
    public function getCities(): Collection
    {
        return $this->cities;
    }

    /**
     * @param Collection $cities
     */
    public function setCities(Collection $cities): void
    {
        $this->cities = $cities;
    }

    /**
     * @return Sector|null
     */
    public function getFavoriteHangoutPlace(): ?Sector
    {
        return $this->favoriteHangoutPlace;
    }

    /**
     * @param Sector $favoriteHangoutPlace
     */
    public function setFavoriteHangoutPlace(Sector $favoriteHangoutPlace): void
    {
        $this->favoriteHangoutPlace = $favoriteHangoutPlace;
    }

    /**
     * @return string|null
     */
    public function getFavoriteCuisine(): ?string
    {
        return $this->favoriteCuisine;
    }

    /**
     * @param string|null $favoriteCuisine
     */
    public function setFavoriteCuisine(?string $favoriteCuisine): void
    {
        $this->favoriteCuisine = $favoriteCuisine;
    }

    public function getRoles()
    {
        return ['ROLE_TRAVELLER'];
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * @return string|null
     */
    public function getDreamHoliday(): ?string
    {
        return $this->dreamHoliday;
    }

    /**
     * @param string|null $dreamHoliday
     */
    public function setDreamHoliday(?string $dreamHoliday): void
    {
        $this->dreamHoliday = $dreamHoliday;
    }
}
