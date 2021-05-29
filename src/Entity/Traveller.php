<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Traveller
 *
 * @ORM\Table(name="traveller", indexes={@ORM\Index(name="IDX_92E7B427FE5D6CDA", columns={"traveller_category_id"}), @ORM\Index(name="IDX_92E7B4271C9DA55", columns={"nationality_id"})})
 * @ORM\Entity
 */
class Traveller
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
     * @var TravellerCategory
     *
     * @ORM\ManyToOne(targetEntity="TravellerCategory", inversedBy="travellers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="traveller_category_id", referencedColumnName="id")
     * })
     */
    private $travellerCategory;

}
