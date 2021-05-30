<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 *
 * @ORM\Table(name="country")
 * @ORM\Entity
 */
class Country
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
     * @ORM\Column(name="code_one", type="string", length=5, nullable=false)
     */
    private $codeOne;

    /**
     * @var string
     *
     * @ORM\Column(name="code_two", type="string", length=5, nullable=false)
     */
    private $codeTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="country_name", type="string", length=300, nullable=false)
     */
    private $countryName;

    /**
     * @var string
     *
     * @ORM\Column(name="nationality", type="string", length=300, nullable=false)
     */
    private $nationality;

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
    public function getCodeOne(): string
    {
        return $this->codeOne;
    }

    /**
     * @param string $codeOne
     */
    public function setCodeOne(string $codeOne): void
    {
        $this->codeOne = $codeOne;
    }

    /**
     * @return string
     */
    public function getCodeTwo(): string
    {
        return $this->codeTwo;
    }

    /**
     * @param string $codeTwo
     */
    public function setCodeTwo(string $codeTwo): void
    {
        $this->codeTwo = $codeTwo;
    }

    /**
     * @return string
     */
    public function getCountryName(): string
    {
        return $this->countryName;
    }

    /**
     * @param string $countryName
     */
    public function setCountryName(string $countryName): void
    {
        $this->countryName = $countryName;
    }

    /**
     * @return string
     */
    public function getNationality(): string
    {
        return $this->nationality;
    }

    /**
     * @param string $nationality
     */
    public function setNationality(string $nationality): void
    {
        $this->nationality = $nationality;
    }

}
