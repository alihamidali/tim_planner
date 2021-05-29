<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Business
 *
 * @ORM\Table(name="business", indexes={@ORM\Index(name="IDX_8D36E38DE95C867", columns={"sector_id"}), @ORM\Index(name="IDX_8D36E38F92F3E70", columns={"nationality_id"})})
 * @ORM\Entity
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class Business implements UserInterface
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
     * @ORM\Column(name="company_name", type="string", length=300, nullable=false)
     */
    private $companyName;

    /**
     * @var string
     *
     * @ORM\Column(name="designation", type="string", length=300, nullable=false)
     */
    private $designation;

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
     * @ORM\Column(name="address1", type="string", length=500, nullable=false)
     */
    private $address1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address2", type="string", length=500, nullable=true)
     */
    private $address2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address3", type="string", length=500, nullable=true)
     */
    private $address3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="company_website", type="string", length=300, nullable=true)
     */
    private $companyWebsite;

    /**
     * @var string|null
     *
     * @ORM\Column(name="company_logo", type="string", length=300, nullable=true)
     */
    private $companyLogo;

    /**
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="City")
     * @ORM\JoinTable(name="business_cities",
     *     joinColumns={@ORM\JoinColumn(name="city_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="business_id", referencedColumnName="id")}
     * )
     */
    private $city;

    /**
     * @var Sector
     *
     * @ORM\ManyToOne(targetEntity="Sector", inversedBy="businesses")
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
     *   @ORM\JoinColumn(name="nationality_id", referencedColumnName="id")
     * })
     */
    private $nationality;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified = false;

    public function getRoles()
    {
        // TODO: Implement getRoles() method.
    }

    public function getPassword()
    {
        // TODO: Implement getPassword() method.
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function getUsername()
    {
        // TODO: Implement getUsername() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

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
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     */
    public function setCompanyName(string $companyName): void
    {
        $this->companyName = $companyName;
    }

    /**
     * @return string
     */
    public function getDesignation(): string
    {
        return $this->designation;
    }

    /**
     * @param string $designation
     */
    public function setDesignation(string $designation): void
    {
        $this->designation = $designation;
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
    public function getAddress1(): string
    {
        return $this->address1;
    }

    /**
     * @param string $address1
     */
    public function setAddress1(string $address1): void
    {
        $this->address1 = $address1;
    }

    /**
     * @return string|null
     */
    public function getAddress2(): ?string
    {
        return $this->address2;
    }

    /**
     * @param string|null $address2
     */
    public function setAddress2(?string $address2): void
    {
        $this->address2 = $address2;
    }

    /**
     * @return string|null
     */
    public function getAddress3(): ?string
    {
        return $this->address3;
    }

    /**
     * @param string|null $address3
     */
    public function setAddress3(?string $address3): void
    {
        $this->address3 = $address3;
    }

    /**
     * @return string|null
     */
    public function getCompanyWebsite(): ?string
    {
        return $this->companyWebsite;
    }

    /**
     * @param string|null $companyWebsite
     */
    public function setCompanyWebsite(?string $companyWebsite): void
    {
        $this->companyWebsite = $companyWebsite;
    }

    /**
     * @return string|null
     */
    public function getCompanyLogo(): ?string
    {
        return $this->companyLogo;
    }

    /**
     * @param string|null $companyLogo
     */
    public function setCompanyLogo(?string $companyLogo): void
    {
        $this->companyLogo = $companyLogo;
    }

    /**
     * @return Collection
     */
    public function getCity(): Collection
    {
        return $this->city;
    }

    /**
     * @param Collection $city
     */
    public function setCity(Collection $city): void
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
     * @return Country
     */
    public function getNationality(): Country
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

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

}
